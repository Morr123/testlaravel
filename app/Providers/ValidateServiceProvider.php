<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class ValidateServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('in_set', function ($attribute, $value, $parameters, $validator) {
			list($model, $field, $fieldId) = $parameters;
			return $model::findInSet($field, $value)->whereId($validator->getData()[$fieldId])->exists();
		});
    }
}
