import { convertToURL } from './functions/convertToURL.js';
import { CustomEvents } from './Events/CustomEvents.js';


export class HttpRequest
{
    /**
     * @typedef { Object } HttpRequestInterface
     *
     * @property { string } url
     *
     * @property { XMLHttpRequestResponseType? } responseType
     *
     * @property { 'get' | 'post' } method
     *
     * @property { any? } data
     *
     * @property { Object? } headers
     */

    /**
     * @public
     *
     * @type { CustomEvents }
     */
    _customEvents = new CustomEvents()

    /**
     * @protected
     *
     * @type { HttpRequestInterface }
     */
    _settings;

    /**
     * @protected
     *
     * @type { XMLHttpRequest }
     */
    _xmlHttpRequest;

    /**
     * @protected
     *
     * @type { URL }
     */
    _url;

    /**
     * @protected
     *
     * @type { URL }
     */
    _headers =
        {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        };

    /**
     * @constructor
     *
     * @param { HttpRequestInterface } settings
     */
    constructor(settings)
    {
        this._settings = settings;

        this._url = convertToURL(settings.url);
    }

    /**
     * Sends the request.
     *
     * @public
     *
     * @param { HttpRequestInterface } settings
     *
     * @return { Promise<HttpRequest> }
     */
    static async send(settings)
    {
        const httpRequest = new HttpRequest(settings);

        return httpRequest._send();
    }

    /**
     * Sends the request.
     *
     * @protected
     *
     * @return { Promise<HttpRequest> }
     */
    _send()
    {
        this._xmlHttpRequest = new XMLHttpRequest();

        this._xmlHttpRequest.responseType = this._settings.responseType || 'json';

        this._xmlHttpRequest.open(this._settings.method, this._url);

        this._headerProcessing();

        this._xmlHttpRequest.send(this.getData());

        return new Promise(this._promiseHandler.bind(this));
    }

    /**
     * Handles the process of headers.
     *
     * @protected
     *
     * @return { void }
     */
    _headerProcessing()
    {
        for (const key in this._headers)
        {
            this._xmlHttpRequest.setRequestHeader(key, this._headers[ key ]);
        }
    }

    /**
     * Handles the process of the Promise.
     *
     * @protected
     *
     * @param { (value: unknown) => void } resolve
     *
     * @param { (value: unknown) => void } reject
     *
     * @return { void }
     */
    _promiseHandler(resolve, reject)
    {
        this._xmlHttpRequest.onload = () =>
        {
            resolve(this);

            this._customEvents.execute('load', this);
        };

        this._xmlHttpRequest.onerror = reject.bind(this);
    }

    /**
     * Gets the data.
     *
     * @public
     *
     * @return { URLSearchParams | FormData | string }
     */
    getData()
    {
        const data = this._settings.data;

        if (typeof data === 'string')
        {
            return data;
        }

        if (data instanceof URLSearchParams || data instanceof FormData)
        {
            return data;
        }

        const newData = this._settings.method === 'post' ? new FormData() : new URLSearchParams();

        for (const key in data)
        {
            newData.set(key, data[ key ]);
        }
    }

    /**
     * Gets the response.
     *
     * @public
     *
     * @return { HttpResponse }
     */
    getResponse()
    {
        return this._xmlHttpRequest.response;
    }
}
