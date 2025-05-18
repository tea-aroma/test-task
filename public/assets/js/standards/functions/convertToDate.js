/**
 * Converts the specified object Date to date string.
 *
 * @param { Date } date
 *
 * @return { string }
 */
export function convertToDate(date)
{
    return `${ date.getFullYear() }-${ (date.getMonth() + 1).toString().padStart(2, '0') }-${ date.getDate().toString().padStart(2, '0') }`;
}
