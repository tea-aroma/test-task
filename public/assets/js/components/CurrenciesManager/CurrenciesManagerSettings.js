import { CurrenciesManagerDisplayTypesEnum } from './CurrenciesManagerDisplayTypesEnum.js';


/**
 * Contains all possible settings for CurrenciesManager Component.
 */
export class CurrenciesManagerSettings
{
    /**
     * @typedef { Object } CurrenciesManagerSettingInterface
     *
     * @property { HTMLDivElement? } domElement
     *
     * @property { string? } domElementClassName
     *
     * @property { number? } delay
     *
     * @property { boolean? } autoupdate
     *
     * @property { CurrenciesManagerDataOptionsInterface? } dataOptions
     *
     * @property { string } url
     *
     * @property { CurrenciesManagerDisplayTypesEnum? } displayType
     *
     * @property { number? } columns
     *
     * @property { number? } gap
     */

    /**
     * @typedef { Object } CurrenciesManagerDataOptionsInterface
     *
     * @property { string? } includes
     *
     * @property { string? } includes_key
     */

    /**
     * @public
     *
     * @type { HTMLDivElement }
     */
    domElement;

    /**
     * @public
     *
     * @type { string }
     */
    domElementClassName = 'currencies-manager';

    /**
     * @public
     *
     * @type { number }
     */
    delay;

    /**
     * @public
     *
     * @type { boolean }
     */
    autoupdate = true;

    /**
     * @public
     *
     * @type { CurrenciesManagerDataOptionsInterface }
     */
    dataOptions;

    /**
     * @public
     *
     * @type { string }
     */
    url;

    /**
     * @public
     *
     * @type { CurrenciesManagerDisplayTypesEnum }
     */
    displayType = CurrenciesManagerDisplayTypesEnum.LIST;

    /**
     * @public
     *
     * @type { number }
     */
    columns = 4;

    /**
     * @public
     *
     * @type { number }
     */
    gap = 10;

    /**
     * @constructor
     *
     * @param { CurrenciesManagerSettingInterface } settings
     */
    constructor(settings)
    {
        Object.assign(this, settings);
    }
}
