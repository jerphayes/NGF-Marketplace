import { defineBehavior } from '../core/behavior';
import { query, setText } from '../core/dom';
import { isStoredLocation, readJson, writeJson, type StoredLocation } from '../core/storage';

const STORAGE_KEY = 'ngf-marketplace.location';
const COUNTRY_NAME = 'United States';
const COUNTRY_CODE = 'US';

function label(location: StoredLocation | null): string {
    const city = location?.cityName.trim() ?? '';

    return city === '' ? COUNTRY_NAME : `${city}, ${COUNTRY_NAME}`;
}

export const locationPicker = defineBehavior<HTMLElement>({
    name: 'location-picker',
    selector: '[data-location-picker]',
    mount(root) {
        const cityInput = query<HTMLInputElement>('[data-location-city]', HTMLInputElement, root);
        const applyButton = query<HTMLButtonElement>('[data-location-apply]', HTMLButtonElement, root);
        const status = query<HTMLElement>('[data-location-status]', HTMLElement, root);
        const disclosure = root.closest('details');
        const labels = Array.from(document.querySelectorAll('[data-location-label]'));

        if (cityInput === null || applyButton === null) {
            return;
        }

        const paint = (location: StoredLocation | null): void => {
            const text = label(location);

            for (const node of labels) {
                setText(node, text);
            }
        };

        const announce = (message: string): void => {
            if (status !== null) {
                setText(status, message);
            }
        };

        const rawStored = readJson(STORAGE_KEY, isStoredLocation);
        const stored =
            rawStored !== null &&
            (rawStored.countryCode.toUpperCase() === COUNTRY_CODE ||
                rawStored.countryName === COUNTRY_NAME)
                ? rawStored
                : null;

        if (stored?.cityName) {
            cityInput.value = stored.cityName;
        }

        paint(stored);

        applyButton.addEventListener('click', () => {
            const cityName = cityInput.value.trim();

            const location: StoredLocation = {
                countryId: null,
                countryCode: COUNTRY_CODE,
                countryName: COUNTRY_NAME,
                cityId: null,
                cityName,
            };

            writeJson(STORAGE_KEY, location);
            paint(location);
            announce(cityName === '' ? 'United States selected.' : `${cityName}, United States saved.`);

            if (disclosure !== null) {
                disclosure.open = false;
            }
        });
    },
});
