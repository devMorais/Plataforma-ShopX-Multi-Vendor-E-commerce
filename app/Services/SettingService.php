<?php

namespace  App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

class SettingService {

    function getSettings()
    {
        // Em instalação nova (antes das migrations) a tabela ainda não existe;
        // evita quebrar o boot do app/artisan durante o setup inicial.
        if (! Schema::hasTable('settings')) {
            return [];
        }

        return Cache::rememberForever('settings', function() {
            return Setting::pluck('value', 'key')->toArray();
        });
    }

    function setSettings()
    {
        $settings = $this->getSettings();
        config()->set('settings', $settings);
    }

    function clearCashedSettings()
    {
        Cache::forget('settings');
    }
}
