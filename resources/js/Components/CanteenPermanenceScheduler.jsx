import * as React from 'react';
import { ScheduleComponent, Month, Inject, Resize, DragAndDrop, ViewsDirective, ViewDirective, Year } from '@syncfusion/ej2-react-schedule';
// import './schedule-component.css';
import { extend } from '@syncfusion/ej2-base';
// import { updateSampleSection } from '../common/sample-base';
// import * as dataSource from './datasource.json';
/**
 * Schedule local data sample
 */
function CanteenPermanenceScheduler( {permanences}) {
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
    }


    return (<div className='schedule-control-section'>
      <div className='col-lg-12 control-section'>
        <div className='control-wrapper'>
          <ScheduleComponent width='100%' height='650px'
            currentView='Month'
            // selectedDate={new Date(2021, 1, 15)}
            // ref={t => scheduleObj = t}
            eventSettings={{ dataSource: data }}
            navigating = {onNavigation.bind(this)}
            // eventRendered={onEventRendered.bind(this)}
            >
            {/* <Inject services={[Day, Week, WorkWeek, Month, Agenda, Resize, DragAndDrop]}/> */}
            <Inject services={[Month, Resize, DragAndDrop]}/>
            <ViewsDirective>
                <ViewDirective option='Month' isSelected={true}></ViewDirective>
                <ViewDirective option='Year' isSelected={false}></ViewDirective>
            </ViewsDirective>
          </ScheduleComponent>
        </div>
      </div>
    </div>);
}
export default CanteenPermanenceScheduler;
