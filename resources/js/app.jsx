import './bootstrap';
import '../css/app.css';

import React from 'react';
import { createRoot } from 'react-dom/client';
import { createInertiaApp } from '@inertiajs/inertia-react';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

import { registerLicense } from '@syncfusion/ej2-base';

import * as ej2localenl from '@syncfusion/ej2-locale/src/nl.json'
import * as numbers from 'cldr-data/main/nl/numbers.json';
import * as datefields from 'cldr-data/main/nl/datefields.json';
import * as gregorian from 'cldr-data/main/nl/ca-gregorian.json';
import * as timeZoneNames from 'cldr-data/main/nl/timeZoneNames.json';


import { loadCldr } from '@syncfusion/ej2-base';

import {L10n, setCulture} from '@syncfusion/ej2-base';

loadCldr(numbers, gregorian, timeZoneNames,datefields);

setCulture('nl');

L10n.load(ej2localenl);



// Registering Syncfusion license key
registerLicense('ORg4AjUWIQA/Gnt2VVhjQlFaclhJXGFWfVJpTGpQdk5xdV9DaVZUTWY/P1ZhSXxRd0RjXn5edHxQQmBcVE0=');

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.jsx`, import.meta.glob('./Pages/**/*.jsx')),
    setup({ el, App, props }) {
        const root = createRoot(el);

        root.render(<App {...props} />);
    },
});

InertiaProgress.init({ color: '#4B5563' });
