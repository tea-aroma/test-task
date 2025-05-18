/**
 * Contains all possible settings for the Currency component.
 */
export class CurrencySettings
{
    /**
     * @typedef { Object } CurrencySettingInterface
     *
     * @property { HTMLDivElement? } domElement
     *
     * @property { string? } domElementClassName
     *
     * @property { string? } domLabelClassName
     *
     * @property { string? } domHeaderClassName
     *
     * @property { string? } domCharCodeClassName
     *
     * @property { string? } domNumCodeClassName
     *
     * @property { string? } domValuesClassName
     *
     * @property { string? } domValueClassName
     *
     * @property { string? } domVunitRateClassName
     *
     * @property { string? } domIconClassName
     *
     * @property { string? } domEqualIconClassName
     *
     * @property { string? } arrowIconId
     *
     * @property { string? } equalIconId
     *
     * @property { number? } delay
     *
     * @property { string? } url
     *
     * @property { Object<string, any>? } data
     *
     * @property { CurrencyData? } record
     */

    /**
     * @public
     *
     * @type { ?HTMLElement }
     */
    domElement;

    /**
     * @public
     *
     * @type { ?string }
     */
    domElementClassName = 'currency currency--style-default currency--type-default';

    /**
     * @public
     *
     * @type { ?string }
     */
    domLabelClassName = 'currency__label';

    /**
     * @public
     *
     * @type { ?string }
     */
    domHeaderClassName = 'currency__header';

    /**
     * @public
     *
     * @type { ?string }
     */
    domCharCodeClassName = 'currency__char-code';

    /**
     * @public
     *
     * @type { ?string }
     */
    domNumCodeClassName = 'currency__num-code';

    /**
     * @public
     *
     * @type { ?string }
     */
    domValuesClassName = 'currency__values';

    /**
     * @public
     *
     * @type { ?string }
     */
    domValueClassName = 'currency__value';

    /**
     * @public
     *
     * @type { ?string }
     */
    domVunitRateClassName = 'currency__vunit-rate';

    /**
     * @public
     *
     * @type { ?string }
     */
    domIconClassName = 'currency__icon';

    /**
     * @public
     *
     * @type { ?string }
     */
    domEqualIconClassName = 'currency__equal-icon';

    /**
     * @public
     *
     * @type { ?string }
     */
    arrowIconId = 'chevron-up';

    /**
     * @public
     *
     * @type { ?string }
     */
    equalIconId = 'subtract';

    /**
     * @public
     *
     * @type { ?number }
     */
    delay = 5000;

    /**
     * @public
     *
     * @type { string }
     */
    url;

    /**
     * @public
     *
     * @type { Object<string, any> }
     */
    data = {};

    /**
     * @public
     *
     * @type { CurrencyData }
     */
    record;

    /**
     * @constructor
     *
     * @param { CurrencySettingInterface } settings
     */
    constructor(settings)
    {
        Object.assign(this, settings);
    }
}
