import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {LineChart} from 'react-easy-chart';
import Tabs from 'muicss/lib/react/tabs';
import Tab from 'muicss/lib/react/tab';
import './css/mui.tab.css';

let week = require('./json/bodyfat-week.json');
let month = require('./json/bodyfat-month.json');
let year = require('./json/bodyfat-year.json');
 
export default class BodyFatGraph extends Component {
   constructor(props) {
    super(props);
    this.state = {
      week: week,
      month: month,
      year: year, 
      current: 12.6,
      showToolTip: false,
      top: 0,
      left: 0,
      x: 0,
      y: 0
    };

    this.mouseOverHandler = this.mouseOverHandler.bind(this);
  }

  render() {
    var stuff = this.state.data;
    var tooltip = null;
    if(this.state.showToolTip) {
      tooltip = this.selected();
    }
    return (
      <div>        
        {tooltip}
        <Tabs justified={true} onChange={this.onChange}>
          <Tab value="Past Week" label="Past Week">
            <LineChart
              xType={'text'}
              yDomainRange={[0, 100]}
              axes
              dataPoints
              mouseOverHandler={this.mouseOverHandler}
              width={750}
              height={500}
              grid
              axisLabels={{x: 'Reading', y: 'Body Fat Percentage'}}
            data={[this.state.week]}/>
          </Tab>
          <Tab value="Past Month" label="Past Month">
            <LineChart
              xType={'text'}
              yDomainRange={[0, 100]}
              axes
              dataPoints
              mouseOverHandler={this.mouseOverHandler}
              width={750}
              height={500}
              grid
              axisLabels={{x: 'Reading', y: 'Average Body Fat Percentage'}}
            data={[this.state.month]}/>
          </Tab>
          <Tab value="Past Year" label="Past Year">
            <LineChart
              xType={'text'}
              yDomainRange={[0, 100]}
              axes
              dataPoints
              mouseOverHandler={this.mouseOverHandler}
              width={750}
              height={500}
              grid
              axisLabels={{x: 'Reading', y: 'Average Body Fat Percentage'}}
            data={[this.state.year]}/>
          </Tab>
        </Tabs> 
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

if (document.getElementById('body-fat-graph')) {
    ReactDOM.render(<BodyFatGraph />, document.getElementById('body-fat-graph'));
}