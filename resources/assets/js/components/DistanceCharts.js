import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {LineChart} from 'react-easy-chart';
import {BarChart} from 'react-easy-chart';
import Tabs from 'muicss/lib/react/tabs';
import Tab from 'muicss/lib/react/tab';
import { timeParse as parse } from 'd3-time-format';
import './css/mui.tab.css';

let data = require('./json/distance.json')["distance"]["dataset"];
let dataDay = require('./json/distanceData.json')["dataset"]["distanceDay"];
let dataWeek = require('./json/distanceData.json')["dataset"]["distanceWeek"];
let dataMonth = require('./json/distanceData.json')["dataset"]["distanceMonth"];
let dataYear = require('./json/distanceData.json')["dataset"]["distanceYear"];
 
export default class DistanceCharts extends Component {
  constructor(props) {
    super(props);

    var array = [];
    for( var i = 0; i < data.length; i++ ){
      array.push({"x": data[i].time, "y": data[i].distance})
    };

    this.state = {
      data: array,
      dataDay: dataDay,
      dataWeek: dataWeek, 
      dataMonth: dataMonth, 
      dataYear: dataYear, 
      componentWidth: 300,
      current: 0,
      showToolTip: false,
      top: 0,
      left: 0,
      x: 0,
      y: 0
    };

    this.handleResize = this.handleResize.bind(this);
    this.mouseOverHandler = this.mouseOverHandler.bind(this);
  }

  componentDidMount() {    
    window.addEventListener('resize', this.handleResize);
    this.handleResize();
  }

  componentWillUnmount() {
    window.removeEventListener('resize', this.handleResize);
  }

  handleResize() {
    this.setState({
      windowWidth: window.innerWidth - 100,
      componentWidth: this.myInput.offsetWidth
    });
  }

  render() {
    var stuff = this.state.data;

    var tooltip = null;
    if(this.state.showToolTip) {
      tooltip = this.selected();
    }

    return (
        <div ref={input => {this.myInput = input}}>
            <Tabs justified={true} onChange={this.onChange}>
                <Tab value="Past Day" label="Past Day">
                    <LineChart
                    axes
                    grid
                    dataPoints
                    datePattern={'%H:%M'}
                    margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
                    width = {this.state.componentWidth - 100}
                    height={this.state.componentWidth / 2}
                    mouseOverHandler={this.mouseOverHandler}
                    lineColors={['#5DADE2']}
                    axisLabels={{x: 'Time', y: 'Distance Travelled (Meters)'}}
                    xType={'time'}
                    data={[this.state.data]}
                    />
                </Tab>
                <Tab value="Past Week" label="Past Week">
                    <BarChart
                    axes
                    colorBars
                    barWidth = {15}
                    margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
                    width = {this.state.componentWidth - 80}
                    height = {this.state.componentWidth / 2}
                    axisLabels={{x: 'Day', y: 'Distance Travelled (Meters)'}}
                    mouseOverHandler={this.mouseOverHandler}
                    data={this.state.dataWeek}/>
                </Tab>
                <Tab value="Past Month" label="Past Month">
                    <BarChart
                    axes
                    colorBars
                    barWidth = {15}
                    margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
                    width = {this.state.componentWidth - 80}
                    height = {this.state.componentWidth / 2}
                    axisLabels={{x: 'Day', y: 'Distance Travelled (Meters)'}}
                    mouseOverHandler={this.mouseOverHandler}
                    data={this.state.dataMonth}/>
                </Tab>
                <Tab value="Past Year" label="Past Year">
                    <BarChart
                    axes
                    colorBars
                    barWidth = {15}
                    margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
                    width = {this.state.componentWidth - 80}
                    height = {this.state.componentWidth / 2}
                    axisLabels={{x: 'Month', y: 'Distance Travelled (Meters)'}}
                    mouseOverHandler={this.mouseOverHandler}
                    data={this.state.dataYear}/>
                </Tab>
            </Tabs>
            {tooltip}
        </div>
    );
  }
  selected(){
    return (<h5>{this.state.y} meters</h5>);
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

if (document.getElementById('distance-charts')) {
    ReactDOM.render(<DistanceCharts />, document.getElementById('distance-charts'));
}