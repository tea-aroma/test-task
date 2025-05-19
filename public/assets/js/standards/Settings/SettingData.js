import { Data } from '../Data/Data.js';


/**
 * @inheritDoc
 */
export class SettingData extends Data
{
    /**
     * @typedef { Object<keyof SettingData, typeof SettingData[ keyof SettingData ]> } SettingDataInterface
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
     * @type { string }
     */
    key;

    /**
     * @public
     *
     * @type { string }
     */
    value;

    /**
     * @public
     *
     * @type { string }
     */
    description;

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
     * @return { SettingData }
     */
    static fromValues(values)
    {
        const instance = new SettingData();

        instance.fill(values);

        return instance;
    }
}
