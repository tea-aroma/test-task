import { HttpRequest } from '../HttpRequest.js';
import { SettingData } from './SettingData.js';


/**
 * Provides help working for settings.
 */
export class Settings
{
    /**
     * Gets a setting by the specified key.
     *
     * @public
     *
     * @param { SettingKeysEnum } key
     *
     * @return { Promise<SettingData> }
     */
    static async get(key)
    {
        const httpRequest = await HttpRequest.send({ url: `api/settings/settings/get/${ key }`, method: 'get' });

        return SettingData.fromValues(httpRequest.getResponse().record);
    }

    /**
     * Gets a setting value by the specified key.
     *
     * @public
     *
     * @param { SettingKeysEnum } key
     *
     * @return { Promise<string> }
     */
    static async value(key)
    {
        const record = await this.get(key);

        return SettingData.fromValues(record).value;
    }
}
