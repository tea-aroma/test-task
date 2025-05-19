import { SettingsForm } from '../components/SettingsForms/SettingsForm.js';
import { InputTypesEnum } from '../components/SettingsForms/Form/InputTypesEnum.js';

/**
 * @var { SettingsFormSettingInterface }
 */
const settings =
    {
        url: 'api/settings/settings/list',
        updateUrl: 'api/settings/settings/update',
        inputs:
            [
                { type: InputTypesEnum.TEXT, name: 'id', placeholder: 'Key', disabled: true, domElementClassName: 'input input--type-id' },
                { type: InputTypesEnum.TEXT, name: 'key', placeholder: 'Key' },
                { type: InputTypesEnum.TEXT, name: 'value', placeholder: 'Value' },
                { type: InputTypesEnum.TEXT, name: 'description', placeholder: 'Description' },
            ],
    }

const settingsForm = new SettingsForm(settings);

settingsForm.initialization();

document.querySelector('.main').append(settingsForm.getDomElement());
