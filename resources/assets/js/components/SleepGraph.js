import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {LineChart} from 'react-easy-chart';
import Tabs from 'muicss/lib/react/tabs';
import Tab from 'muicss/lib/react/tab';
import './css/mui.tab.css';

let week = require('./json/sleep-week.json');
let month = require('./json/sleep-month.json');
let year = require('./json/sleep-year.json');
 
export default class SleepGraph extends Component {
   constructor(props) {
    super(props);
    this.state = {
      user: {},
      week: week,
      month: month,
      year: year, 
      current: 7.6,
      showToolTip: false,
      top: 0,
      left: 0,
      x: 0,
      y: 0,
      componentWidth: 300,
    };

    this.handleResize = this.handleResize.bind(this);
    this.mouseOverHandler = this.mouseOverHandler.bind(this);
  }

  componentDidMount() {
        var param = this.props.params.user;
        var user = users.filter(function(user){
            if(user.firstName === param){
                console.log("YOOO MATCH");
                return user;
            }
        })
        this.setState({user: user[0]});

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
                <Tab value="Past Week" label="Past Week">
                <LineChart
                    xType={'text'}
                    yDomainRange={[0, 15]}
                    axes
                    dataPoints
                    lineColors={['#5DADE2']}
                    mouseOverHandler={this.mouseOverHandler}
                    width = {this.state.componentWidth - 100}
                    height={this.state.componentWidth / 2}
                    grid
                    axisLabels={{x: 'Day', y: 'Hours of Sleep'}}
                data={[this.state.week]}/>
                </Tab>
                <Tab value="Past Month" label="Past Month">
                <LineChart
                    xType={'text'}
                    yDomainRange={[0, 15]}
                    axes
                    dataPoints
                    lineColors={['#5DADE2']}
                    mouseOverHandler={this.mouseOverHandler}
                    width = {this.state.componentWidth - 100}
                    height={this.state.componentWidth / 2}
                    grid
                    axisLabels={{x: 'Day', y: 'Hours of Sleep'}}
                data={[this.state.month]}/>
                </Tab>
                <Tab value="Past Year" label="Past Year">
                <LineChart
                    xType={'text'}
                    yDomainRange={[0, 15]}
                    axes
                    dataPoints
                    lineColors={['#5DADE2']}
                    mouseOverHandler={this.mouseOverHandler}
                    width = {this.state.componentWidth - 100}
                    height={this.state.componentWidth / 2}
                    grid
                    axisLabels={{x: 'Month', y: 'Average hours of Sleep'}}
                data={[this.state.year]}/>
                </Tab>
            </Tabs>
            {tooltip}                
        </div>
				
    );
  }
  selected(){
  	return (<h1>{this.state.y} hours</h1>);
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

if (document.getElementById('sleep-graph')) {
    ReactDOM.render(<SleepGraph />, document.getElementById('sleep-graph'));
}