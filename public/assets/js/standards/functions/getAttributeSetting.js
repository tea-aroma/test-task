/**
 * Gets the setting attribute.
 *
 * @param { Element } element
 *
 * @param { string } qualifiedName
 *
 * @param { string } defaultValue
 *
 * @return { string }
 */
export function getAttributeSetting(element, qualifiedName, defaultValue)
{
    return element.getAttribute(qualifiedName) || defaultValue;
}
