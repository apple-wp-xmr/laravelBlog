<?php

namespace App\Exporter;

class UserStatsCsvExpoerter implements UserStatsExporterContract {

    public $translator;

    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    public function export(int $userId){
        return 'Export user #' . $userId . ' ' .'statistics as CSV';
    }
}
