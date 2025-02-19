<?php

namespace App\Console\Commands;

use App\Models\Card;
use App\Models\Set;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

use function Laravel\Prompts\progress;

class ImportData extends Command
{
    protected $signature = "app:import-data";
    protected $description = "Permet de récupérer gentiment les données d\'une autre API";

    private $useCache = false;
    public function handle()
    {
        $url = "https://lorcanajson.org/files/current/fr/allCards.json";
        if ($this->useCache) {
            $data = json_decode(file_get_contents(storage_path("app/data.json")));
        } else {
            $request = Http::get($url);
            $data = json_decode($request->body());
            file_put_contents(storage_path("app/data.json"), json_encode($data));
        }

        $sets = $data->sets;
        $cards = $data->cards;

        $this->syncSets($sets);
        $this->syncCards($cards);

        return;
    }

    private function syncCards($data)
    {
        $cards = [];
        $setIdsByApiIds = Set::pluck("id", "api_id");
        foreach ($data as $key => $value) {
            $cards[] = [
                "api_id" => $value->id,
                "set_id" => $setIdsByApiIds[$value->setCode],
                "name" => $value->name,
                "number" => $value->number,
                "version" => $value->version ?? "",
                "card_dentifier" => $value->fullIdentifier,
                "description" => $value->fullText,
                "image" =>  $value->images->full,
                "thumbnail" => $value->images->thumbnail,
                "rarity" => $value->rarity,
                "story" => $value->story,
            ];
        }

        progress(
            "Enregistrement des cartes",
            $cards,
            function ($apiItem) {
                Card::updateOrCreate(
                    [
                        "api_id" => $apiItem["api_id"]
                    ],
                    $apiItem
                );
            }
        );
    }

    private function syncSets($data)
    {
        $sets = [];
        $data = json_decode(json_encode($data), true);
        foreach ($data as $key => $value) {
            $sets[] = [
                "api_id" => $key,
                "name" => $value["name"],
                "code" => $key,
                "type" => $value["type"],
                "card_number" => 0,
                "release_date" => $value["releaseDate"]
            ];
        }

        progress(
            "Enregistrement des chapitres",
            $sets,
            function ($apiItem) {
                Set::updateOrCreate(
                    [
                        "api_id" => $apiItem["api_id"]
                    ],
                    [
                        "name" => $apiItem["name"],
                        "code" => $apiItem["code"],
                        "release_date" => $apiItem["release_date"]
                    ]
                );
            }
        );
    }
}
