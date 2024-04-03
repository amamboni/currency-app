/**
 * Parse big numbers to display up to 20 decimals
 */
export const parseBigNumbers = (value?: number): string | undefined =>
    value?.toLocaleString('en', { maximumFractionDigits: 20 }).replaceAll(',', '')
