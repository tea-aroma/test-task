import { Data } from '../../standards/Data/Data.js';


/**
 * @inheritDoc
 */
export class CurrencyData extends Data
{
    /**
     * @typedef { Object<keyof CurrencyData, typeof CurrencyData[ keyof CurrencyData ]> } CurrencyDataInterface
     */

    /**
     * @public
     *
     * @type { number }
     */
    id;

    /**
     * @public
     *
     * @type { number }
     */
    currency_day_id;

    /**
     * @public
     *
     * @type { string }
     */
    currency_day_date;

    /**
     * @public
     *
     * @type { number }
     */
    currency_id;

    /**
     * @public
     *
     * @type { string }
     */
    currency_valute_id;

    /**
     * @public
     *
     * @type { string }
     */
    currency_num_code;

    /**
     * @public
     *
     * @type { string }
     */
    currency_char_code;

    /**
     * @public
     *
     * @type { string }
     */
    currency_name;

    /**
     * @public
     *
     * @type { number }
     */
    yesterday_nominal = 0;

    /**
     * @public
     *
     * @type { number }
     */
    nominal;

    /**
     * @public
     *
     * @type { number }
     */
    yesterday_value = 0;

    /**
     * @public
     *
     * @type { number }
     */
    value;

    /**
     * @public
     *
     * @type { number }
     */
    yesterday_vunit_rate = 0;

    /**
     * @public
     *
     * @type { number }
     */
    vunit_rate;

    /**
     * @public
     *
     * @type { number }
     */
    currency_setting_id = 0;

    /**
     * @public
     *
     * @type { boolean }
     */
    currency_setting_is_load = false;

    /**
     * @public
     *
     * @type { boolean }
     */
    currency_setting_is_show = false;

    /**
     * @public
     *
     * @type { string }
     */
    created_at;

    /**
     * @public
     *
     * @type { string }
     */
    updated_at;

    /**
     * @inheritDoc
     *
     * @return { CurrencyData }
     */
    static fromValues(values)
    {
        const instance = new CurrencyData();

        instance.fill(values);

        return instance;
    }
}
