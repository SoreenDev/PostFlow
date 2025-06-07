<?php

namespace App\Traits;

use App\Enums\LiveValidationRulesEnum;

trait LivewireValidationHandler
{
    public array $ruleAndMessage ;
    public array $validRules;

    public function setupValidation(string $requestClass): void
    {
        $request = new $requestClass();

        $this->ruleAndMessage = [$request->rules(), $request->messages()];
        $this->setValidRules();
    }

    private function setValidRules(): void
    {
        $this->validRules = [];
        foreach ($this->ruleAndMessage[0] as $key => $ruleSet)
        {
            $validRules = [];

            foreach ($ruleSet as $rule) {
                $ruleName = explode(':', $rule);
                if (LiveValidationRulesEnum::tryFrom($ruleName[0])) {
                    $validRules[] = $rule;
                }
            }
            if (!empty($validRules)) {
                $this->validRules[$key] = implode('|', $validRules);
            }
        }
    }




}
