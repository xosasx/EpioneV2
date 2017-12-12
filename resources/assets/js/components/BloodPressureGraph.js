import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {LineChart} from 'react-easy-chart';
import Tabs from 'muicss/lib/react/tabs';
import Tab from 'muicss/lib/react/tab';
import './css/mui.tab.css';

let data = require('./json/bloodpressure-realtime.json');
let day = require('./json/bloodpressure-day.json');
let week = require('./json/bloodpressure-week.json');
let month = require('./json/bloodpressure-month.json');
let year = require('./json/bloodpressure-year.json');
 
export default class BloodPressureGraph extends Component {
   constructor(props) {
    super(props);
    this.state = {data: [],
      day: day,
      week: week,
      month: month,
      year: year, 
      current: 105,
      showToolTip: false,
      top: 0,
      left: 0,
      x: 0,
      y: 0
    };

    this.mouseOverHandler = this.mouseOverHandler.bind(this);
  }
  componentDidMount() {
    var rate;
    var array = [];
    // var d = new Date();
    for (var i = 0; i <= 5; i++) {
      // var h = this.addZero(d.getUTCHours());
      // var m = this.addZero(d.getUTCMinutes() + i);
      rate = Math.floor((Math.random() * 10) + 101);
      array.push({"x": i, "y": rate});
    };

    var i = 5;
    setInterval(() => {
      if(i > 15){
        array.shift();
      }
      array.push({"x": data[i].x, "y": data[i].y});
      // if(data[i].y > 120) this.notify(this.state.user + "Has a Dangerously High Blood Pressure");
      // if(data[i].y < 50) this.notify(this.state.user + "Has a Dangerously Low Blood Pressure");
      this.setState({ data: array, current : data[i].y});
      i++;
  }, 3000);
  }

  
  render() {
    var stuff = this.state.data;
    var tooltip = null;
    if(this.state.showToolTip) {
      tooltip = this.selected();
    }
    return (
        <div>
            <Tabs justified={true} onChange={this.onChange}>
        <Tab value="Realtime" label="Realtime">
          <LineChart
            xType={'text'}
            yDomainRange={[40, 140]}
            axes
            dataPoints
            mouseOverHandler={this.mouseOverHandler}
            mouseOutHandler={this.mouseOutHandler}
            width={750}
            height={500}
            grid
            axisLabels={{x: 'Reading', y: 'Blood Pressure (mmHg)'}}
          data={[this.state.data]}/>
        </Tab>
        <Tab value="Past Day" label="Past Day">
          <LineChart
            xType={'text'}
            yDomainRange={[40, 140]}
            axes
            dataPoints
            mouseOverHandler={this.mouseOverHandler}
            mouseOutHandler={this.mouseOutHandler}
            width={750}
            height={500}
            grid
            axisLabels={{x: 'Reading', y: 'Average Blood Pressure (mmHg)'}}
          data={[this.state.day]}/>
        </Tab>
        <Tab value="Past Week" label="Past Week">
          <LineChart
            xType={'text'}
            yDomainRange={[40, 140]}
            axes
            dataPoints
            mouseOverHandler={this.mouseOverHandler}
            mouseOutHandler={this.mouseOutHandler}
            width={750}
            height={500}
            grid
            axisLabels={{x: 'Reading', y: 'Average Blood Pressure (mmHg)'}}
          data={[this.state.week]}/>
        </Tab>
        <Tab value="Past Month" label="Past Month">
          <LineChart
            xType={'text'}
            yDomainRange={[40, 140]}
            axes
            dataPoints
            mouseOverHandler={this.mouseOverHandler}
            mouseOutHandler={this.mouseOutHandler}
            width={750}
            height={500}
            grid
            axisLabels={{x: 'Reading', y: 'Average Blood Pressure (mmHg)'}}
          data={[this.state.month]}/>
        </Tab>
        <Tab value="Past Year" label="Past Year">
          <LineChart
            xType={'text'}
            yDomainRange={[40, 140]}
            axes
            dataPoints
            mouseOverHandler={this.mouseOverHandler}
            mouseOutHandler={this.mouseOutHandler}
            width={750}
            height={500}
            grid
            axisLabels={{x: 'Reading', y: 'Average Blood Pressure (mmHg)'}}
          data={[this.state.year]}/>
        </Tab>
      </Tabs> 
            {tooltip}
        </div>
    );
  }
  selected(){
    return (<h5>{this.state.y}</h5>);
  }
  addZero(i) {
    if(i >= 60){
      i = i % 60;
    }
    if (i < 10) {
        i = "0" + i;
    }
    return i;
  }
  mouseOverHandler(d, e) {
    this.setState({
      showToolTip: true,
      top: `${e.screenY - 10}px`,
      left: `${e.screenX + 10}px`,
      y: d.y,
      x: d.x});
  }
}

if (document.getElementById('blood-pressure-graph')) {
    ReactDOM.render(<BloodPressureGraph />, document.getElementById('blood-pressure-graph'));
}