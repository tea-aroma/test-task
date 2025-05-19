import { Input } from './Input.js';
import { createHtmlElement } from '../../../standards/functions/createHtmlElement.js';

/**
 * @inheritDoc
 */
export class TextInput extends Input
{
    /**
     * @inheritDoc
     *
     * @protected
     *
     * @return { HTMLInputElement }
     */
    _createDomElement()
    {
        return createHtmlElement('input', this._getAttributes());
    }
}
