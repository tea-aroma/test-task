import { CurrenciesManagerSettings } from './CurrenciesManagerSettings.js';
import { createHtmlElement } from '../../standards/functions/createHtmlElement.js';
import { convertToURL } from '../../standards/functions/convertToURL.js';
import { Currency } from '../Currency/Currency.js';
import { CurrencyData } from '../Currency/CurrencyData.js';
import { CurrenciesManagerDisplayTypesEnum } from './CurrenciesManagerDisplayTypesEnum.js';
import { Settings } from '../../standards/Settings/Settings.js';
import { SettingKeysEnum } from '../../standards/Settings/settingKeysEnum.js';


/**
 * @inheritDoc
 */
export class CurrenciesManager
{
    /**
     * @protected
     *
     * @type { CurrenciesManagerSettings }
     */
    _settings;

    /**
     * @protected
     *
     * @type { HTMLDivElement }
     */
    _domElement;

    /**
     * The items.
     *
     * @public
     *
     * @type { Map<string, Currency> }
     */
    items = new Map();

    /**
     * @constructor
     *
     * @param { CurrenciesManagerSettingInterface } settings
     */
    constructor(settings)
    {
        this._settings = settings instanceof CurrenciesManagerSettings ? settings : new CurrenciesManagerSettings(settings);
    }

    /**
     * Initializes the base logic.
     *
     * @public
     *
     * @return { Promise<void> }
     */
    async initialization()
    {
        if (!this._settings.columns)
        {
            this._settings.columns = parseInt(await Settings.value(SettingKeysEnum.WIDGET_COLUMNS));
        }

        if (!this._settings.delay)
        {
            this._settings.delay = parseInt(await Settings.value(SettingKeysEnum.WIDGET_AUTOUPDATE_INTERVAL));
        }

        this._url = convertToURL(this._settings.url);

        this._domElement = this._settings.domElement || this._createDomElement();

        if (this._settings.autoupdate)
        {
            this.autoupdate();
        }

        await this.update();
    }

    /**
     * Updates the component.
     *
     * @public
     *
     * @return { Promise<void> }
     */
    async update()
    {
        await this._itemsProcessing();
    }

    /**
     * @protected
     *
     * @return { void }
     */
    autoupdate()
    {
        setInterval(() => this.update(), this._settings.delay);
    }

    /**
     * Handles the process for items.
     *
     * @protected
     *
     * @return { void }
     */
    async _itemsProcessing()
    {
        const records = await this.getRecords();

        const fragment = document.createDocumentFragment();

        for (let i = 0, n = records.length; i < n; i++)
        {
            const record = records[ i ];

            const currency = this.items.get(record.currency_char_code) || new Currency();

            if (!currency.isInitialized)
            {
                currency.initialization();

                this.items.set(record.currency_char_code, currency);

                this._currencyStyleProcessing(currency, i);

                fragment.append(currency.getDomElement());
            }

            currency.update(CurrencyData.fromValues(record));
        }

        this._domElement.append(fragment);
    }

    /**
     * Handles the style process for the specified currency.
     *
     * @protected
     *
     * @param { Currency } currency
     *
     * @param { number } index
     *
     * @return { void }
     */
    _currencyStyleProcessing(currency, index)
    {
        switch (this._settings.displayType)
        {
            case CurrenciesManagerDisplayTypesEnum.LIST: this._currencyListStyleProcessing(currency, index); break;
            case CurrenciesManagerDisplayTypesEnum.COLUMNS: this._currencyColumnStyleProcessing(currency, index); break;
        }
    }

    /**
     * Handles the list style process for the specified currency.
     *
     * @protected
     *
     * @param { Currency } currency
     *
     * @param { number } index
     *
     * @return { void }
     */
    _currencyListStyleProcessing(currency, index)
    {
        const style = currency.getDomElement().style;

        if (index > 0)
        {
            style.marginTop = `${ this._settings.gap }px`;
        }
    }

    /**
     * Handles the column style process for the specified currency.
     *
     * @protected
     *
     * @param { Currency } currency
     *
     * @param { number } index
     *
     * @return { void }
     */
    _currencyColumnStyleProcessing(currency, index)
    {
        const style = currency.getDomElement().style;

        style.width = `calc(100% / ${ this._settings.columns } - ${ (this._settings.columns - 1) * this._settings.gap / this._settings.columns }px)`;

        if (index > 0 && index % (this._settings.columns) !== 0)
        {
            style.marginLeft = `${ this._settings.gap }px`;
        }

        if (index > this._settings.columns - 1)
        {
            style.marginTop = `${ this._settings.gap }px`;
        }
    }

    /**
     * Creates a new dom element.
     *
     * @protected
     *
     * @return { HTMLDivElement }
     */
    _createDomElement()
    {
        return createHtmlElement('div', { class: this._settings.domElementClassName + ' ' + this._settings.displayType });
    }

    /**
     * Gets the dom element.
     *
     * @public
     *
     * @return { HTMLDivElement }
     */
    getDomElement()
    {
        return this._domElement;
    }

    /**
     * Sends a request for data.
     *
     * @public
     *
     * @param { URL } url
     *
     * @param { Object } options
     *
     * @return { Promise<HttpResponse> }
     */
    static async request(url, options)
    {
        this.urlSearchParamsProcessing(url, options);

        const xhr = new XMLHttpRequest();

        xhr.open('GET', url);

        xhr.responseType = 'json';

        xhr.send();

        return new Promise((resolve, reject) =>
        {
            xhr.addEventListener('load', () => resolve(xhr.response));

            xhr.addEventListener('error', reject.bind(null, xhr));
        })
    }

    /**
     * Handles the process of the url search params.
     *
     * @public
     *
     * @param { URL } url
     *
     * @param { Object } options
     *
     * @return { URL }
     */
    static urlSearchParamsProcessing(url, options)
    {
        for (const key in options)
        {
            url.searchParams.set(key, options[ key ]);
        }
    }

    /**
     * Gets the records.
     *
     * @public
     *
     * @return { Promise<Array<CurrencyDataInterface>> }
     */
    async getRecords()
    {
        const request = await CurrenciesManager.request(this._url, this._settings.dataOptions);

        return request.data;
    }
}
