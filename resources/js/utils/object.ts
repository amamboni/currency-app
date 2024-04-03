/**
 * Sort object values and return new object
 */
export const sortObjectValues = (obj: Record<any, any>): Record<any, any> => {
    return Object.entries(obj)
        .sort((a, b) => a[1] - b[1])
        .reduce(
            (_sortedObj, [k, v]) => ({
                ..._sortedObj,
                [k]: v,
            }),
            {}
        )
}
