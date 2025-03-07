<?php

declare(strict_types=1);

namespace Ghezibde;

use Fisharebest\Webtrees\Elements\NameType;
use Fisharebest\Webtrees\I18N;
use Fisharebest\Webtrees\SurnameTradition\PatrilinealSurnameTradition;

use function array_filter;

final class GhezibdeSurnameTradition extends PatrilinealSurnameTradition
{
    public function name(): string
    {
        return I18N::translate('patrilineal') . ' (ghezibde)';
    }

    /**
     * @param array<string,string> $parts
     */
    protected function buildName(string $name, array $parts): string
    {
        // Ignore 2 TYPE BIRTH
        $parts = array_filter(
            array: $parts,
            callback: static fn (string $value): bool => $value !== NameType::VALUE_BIRTH
        );

        return parent::buildName(name: $name, parts: $parts);
    }
}

;
