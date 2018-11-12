<?php
/**
 * Created by PhpStorm.
 * User: fomvasss
 * Date: 21.08.18
 * Time: 11:34
 */

namespace Fomvasss\UrlAliases\Traits;

trait UrlAliasable
{
    public function urlAlias()
    {
        $model = config('url-aliases.model', \Fomvasss\UrlAliases\Models\UrlAlias::class);

        return $this->morphOne($model, 'model');
    }

    public function urlAliases()
    {
        $model = config('url-aliases.model', \Fomvasss\UrlAliases\Models\UrlAlias::class);

        return $this->morphMany($model, 'model');
    }
    
    public function scopeUrlA()
    {
        return url($this->urlAlias ? $this->urlAlias->alias : config('url-aliases.url_a_is_empty', '/'));
    }

    public function scopeUrlLA()
    {
        return url($this->urlAlias ? $this->urlAlias->localeAlias : config('url-aliases.url_a_is_empty', '/'));
    }
}