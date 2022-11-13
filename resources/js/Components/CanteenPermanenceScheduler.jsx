import * as React from 'react';
import { ScheduleComponent, Week, Month, Inject, Resize, DragAndDrop, ViewsDirective, ViewDirective, Year } from '@syncfusion/ej2-react-schedule';
import { extend } from '@syncfusion/ej2-base';
import { Inertia } from '@inertiajs/inertia'
import { get } from 'lodash';
import {L10n, setCulture} from '@syncfusion/ej2-base';

// L10n.load({
//     "nl": {
//         "schedule": {
//             "day": "Dag",
//             "week": "Week",
//             "workWeek": "Werkweek",
//             "month": "Maand",
//             "year": "Jaar",
//             "agenda": "Agenda",
//             "weekAgenda": "Weekagenda",
//             "workWeekAgenda": "Werkweek Agenda",
//             "monthAgenda": "Maandagenda",
//             "today": "Vandaag",
//             "noEvents": "Geen evenementen",
//             "emptyContainer": "Er zijn geen evenementen gepland op deze dag.",
//             "allDay": "De hele dag",
//             "start": "Begin",
//             "end": "Einde",
//             "more": "meer",
//             "close": "Sluiten",
//             "cancel": "Annuleren",
//             "noTitle": "(Geen titel)",
//             "delete": "Verwijder",
//             "deleteEvent": "Deze gebeurtenis",
//             "deleteMultipleEvent": "Verwijder meerdere evenementen",
//             "selectedItems": "Items geselecteerd",
//             "deleteSeries": "Hele serie",
//             "edit": "Bewerk",
//             "editSeries": "Reeks bewerken",
//             "editEvent": "Afspraak bewerken",
//             "createEvent": "creëren",
//             "subject": "Onderwerpen",
//             "addTitle": "Titel toevoegen",
//             "moreDetails": "Meer details",
//             "save": "Opslaan",
//             "editContent": "Dit is een afspraak van een reeks. Wilt u deze afspraak bewerken of de hele reeks?",
//             "deleteContent": "Weet u zeker dat u deze afspraak wilt verwijderen?",
//             "deleteMultipleContent": "Weet u zeker dat u de geselecteerde afspraken wilt verwijderen?",
//             "newEvent": "Nieuw evenement",
//             "title": "Titel",
//             "location": "Plaats",
//             "description": "Beschrijving",
//             "timezone": "Tijdzone",
//             "startTimezone": "Start Tijdzone",
//             "endTimezone": "Einde tijdzone",
//             "repeat": "Herhaling",
//             "saveButton": "Opslaan",
//             "cancelButton": "Annuleren",
//             "deleteButton": "verwijderknop",
//             "recurrence": "Herhaling",
//             "wrongPattern": "Het herhalingspatroon is niet geldig.",
//             "seriesChangeAlert": "Wilt u de wijzigingen annuleren die zijn aangebracht in specifieke exemplaren van deze serie en deze opnieuw koppelen aan de hele serie?",
//             "createError": "De duur van het evenement moet korter zijn dan hoe vaak het voorkomt. Kort de duur in of wijzig het terugkeerpatroon in de terugkeereditor.",
//             "sameDayAlert": "Twee gebeurtenissen van dezelfde gebeurtenis kunnen niet op dezelfde dag plaatsvinden.",
//             "occurenceAlert": "Een optreden van de terugkerende afspraak kan niet opnieuw worden gepland als een later optreden van dezelfde afspraak wordt overgeslagen.",
//             "editRecurrence": "Herhaling bewerken",
//             "repeats": "herhalingen",
//             "alert": "alarm",
//             "startEndError": "De geselecteerde einddatum vindt plaats vóór de startdatum.",
//             "invalidDateError": "De ingevoerde datumwaarde is ongeldig.",
//             "blockAlert": "Evenementen kunnen niet worden gepland binnen het geblokkeerde tijdsbereik.",
//             "ok": "OK",
//             "yes": "Ja",
//             "no": "Nee",
//             "occurrence": "voorval",
//             "series": "Serie",
//             "previous": "voorgaand",
//             "next": "De volgende",
//             "timelineDay": "Tijdlijn dag",
//             "timelineWeek": "Tijdlijn Week",
//             "timelineWorkWeek": "Tijdlijn Werkweek",
//             "timelineMonth": "Tijdlijn maand",
//             "timelineYear": "Tijdlijn jaar",
//             "editFollowingEvent": "Evenementen volgen",
//             "deleteTitle": "Evenement Verwijder",
//             "editTitle": "Evenement bewerken",
//             "beginFrom": "Begin vanaf",
//             "endAt": "Eindig op",
//             "expandAllDaySection": "Uitvouwen-hele dag-sectie",
//             "collapseAllDaySection": "Collapse-hele-dag-sectie",
//             "searchTimezone": "Zoek tijdzone",
//             "noRecords": "Geen verslagen gevonden"
//         },
//         "recurrenceeditor": {
//             "none": "Geen",
//             "daily": "Dagelijks",
//             "weekly": "Wekelijks",
//             "monthly": "Maandelijks",
//             "month": "Maand",
//             "yearly": "jaar-",
//             "never": "Nooit",
//             "until": "Tot",
//             "count": "tellen",
//             "first": "Eerste",
//             "second": "Tweede",
//             "third": "Derde",
//             "fourth": "Vierde",
//             "last": "Laatste",
//             "repeat": "Herhaling",
//             "repeatEvery": "Herhaal elke",
//             "on": "Herhaal Aan",
//             "end": "Einde",
//             "onDay": "Dag",
//             "days": "Dag (en)",
//             "weeks": "Weken)",
//             "months": "Maanden)",
//             "years": "Jaar (s)",
//             "every": "elk",
//             "summaryTimes": "keer)",
//             "summaryOn": "Aan",
//             "summaryUntil": "tot",
//             "summaryRepeat": "herhalingen",
//             "summaryDay": "dag (en)",
//             "summaryWeek": "weken)",
//             "summaryMonth": "maanden)",
//             "summaryYear": "jaar (jaren)",
//             "monthWeek": "Maand Week",
//             "monthPosition": "Maandpositie",
//             "monthExpander": "Maanduitbreiding",
//             "yearExpander": "Jaaruitbreiding",
//             "repeatInterval": "Herhaal interval"
//         },
//     }
//     });

/**
 * Schedule local data sample
 */
function CanteenPermanenceScheduler( {permanences, season, month, state}) {
    console.log(state);

    let scheduleObj;
    // const data = extend([], dataSource.zooEventsData, null, true);
    const data = extend([], permanences, null, true);

    function onEventRendered(args) {
        let categoryColor = args.data.CategoryColor;
        if (!args.element || !categoryColor) {
            return;
        }
        if (scheduleObj.currentView === 'Agenda') {
            args.element.firstChild.style.borderLeftColor = categoryColor;
        }
        else {
            args.element.style.backgroundColor = categoryColor;
        }
    }
    function onNavigation(args) {
        console.log(args);
        // args.cancel = true;

        if (args.action == 'date') {
            let previousYear = args.previousDate.getFullYear();
            let currentYear = args.currentDate.getFullYear();
            if (currentYear != previousYear) {
                let currentMonth = args.currentDate.getMonth();
                Inertia.visit(''.concat('/canteenpermanence/', currentYear), {
                    method: 'get',
                    data: {
                        month: currentMonth,
                        currentDate: args.currentDate.toLocaleDateString(),
                    },
                });
            }
        }
    }

    return (<div className='schedule-control-section'>
      <div className='col-lg-12 control-section'>
        <div className='control-wrapper'>
          <ScheduleComponent width='100%' height='650px'
            currentView='Month'
            selectedDate= {state.currentDate}
            // selectedDate={new Date(season, month, 1)}
            locale='nl'
            timezone='Europe/Brussels'
            // ref={t => scheduleObj = t}
            eventSettings={{ dataSource: data }}
            navigating = {onNavigation.bind(this)}

            maxDate = {new Date(2022, 11, 31)}
            minDate = {new Date(2015,0,1)}

            // eventRendered={onEventRendered.bind(this)}
            >
            {/* <Inject services={[Day, Week, WorkWeek, Month, Agenda, Resize, DragAndDrop]}/> */}
            <ViewsDirective>
                <ViewDirective option='Month' />
                <ViewDirective option='Year' />
                <ViewDirective option='Week' />
                {/* <ViewDirective option='Year' isSelected={true}></ViewDirective> */}
            </ViewsDirective>
            <Inject services={[Week, Month, Year, Resize, DragAndDrop]}/>
          </ScheduleComponent>
        </div>
      </div>
    </div>);
}
export default CanteenPermanenceScheduler;
