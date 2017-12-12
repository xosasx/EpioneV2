import React from 'react';
import Tile from "../components/includes/Tile";
import Fetch from 'react-fetch';
import {BarChart} from 'react-easy-chart';
import Tabs from 'muicss/lib/react/tabs';
import Tab from 'muicss/lib/react/tab';

let profile = require('../../profile-test.json');

let jan2014 = require('./json/steps/january2014Steps.json')["step-counter"]["dataset"];
let feb2014 = require('./json/steps/february2014Steps.json')["step-counter"]["dataset"];
let mar2014 = require('./json/steps/march2014Steps.json')["step-counter"]["dataset"];
let apr2014 = require('./json/steps/april2014Steps.json')["step-counter"]["dataset"];
let may2014 = require('./json/steps/may2014Steps.json')["step-counter"]["dataset"];
let jun2014 = require('./json/steps/june2014Steps.json')["step-counter"]["dataset"];
let jul2014 = require('./json/steps/july2014Steps.json')["step-counter"]["dataset"];
let aug2014 = require('./json/steps/august2014Steps.json')["step-counter"]["dataset"];
let sep2014 = require('./json/steps/september2014Steps.json')["step-counter"]["dataset"];
let oct2014 = require('./json/steps/october2014Steps.json')["step-counter"]["dataset"];
let nov2014 = require('./json/steps/november2014Steps.json')["step-counter"]["dataset"];
let dec2014 = require('./json/steps/december2014Steps.json')["step-counter"]["dataset"];

let jan2015 = require('./json/steps/january2015Steps.json')["step-counter"]["dataset"];
let feb2015 = require('./json/steps/february2015Steps.json')["step-counter"]["dataset"];
let mar2015 = require('./json/steps/march2015Steps.json')["step-counter"]["dataset"];
let apr2015 = require('./json/steps/april2015Steps.json')["step-counter"]["dataset"];
let may2015 = require('./json/steps/may2015Steps.json')["step-counter"]["dataset"];
let jun2015 = require('./json/steps/june2015Steps.json')["step-counter"]["dataset"];
let jul2015 = require('./json/steps/july2015Steps.json')["step-counter"]["dataset"];
let aug2015 = require('./json/steps/august2015Steps.json')["step-counter"]["dataset"];
let sep2015 = require('./json/steps/september2015Steps.json')["step-counter"]["dataset"];
let oct2015 = require('./json/steps/october2015Steps.json')["step-counter"]["dataset"];
let nov2015 = require('./json/steps/november2015Steps.json')["step-counter"]["dataset"];
let dec2015 = require('./json/steps/december2015Steps.json')["step-counter"]["dataset"];

let jan2016 = require('./json/steps/january2016Steps.json')["step-counter"]["dataset"];
let feb2016 = require('./json/steps/february2016Steps.json')["step-counter"]["dataset"];
let mar2016 = require('./json/steps/march2016Steps.json')["step-counter"]["dataset"];
let apr2016 = require('./json/steps/april2016Steps.json')["step-counter"]["dataset"];
let may2016 = require('./json/steps/may2016Steps.json')["step-counter"]["dataset"];
let jun2016 = require('./json/steps/june2016Steps.json')["step-counter"]["dataset"];
let jul2016 = require('./json/steps/july2016Steps.json')["step-counter"]["dataset"];
let aug2016 = require('./json/steps/august2016Steps.json')["step-counter"]["dataset"];
let sep2016 = require('./json/steps/september2016Steps.json')["step-counter"]["dataset"];
let oct2016 = require('./json/steps/october2016Steps.json')["step-counter"]["dataset"];
let nov2016 = require('./json/steps/november2016Steps.json')["step-counter"]["dataset"];
let dec2016 = require('./json/steps/december2016Steps.json')["step-counter"]["dataset"];

let jan2017 = require('./json/steps/january2017Steps.json')["step-counter"]["dataset"];
let feb2017 = require('./json/steps/february2017Steps.json')["step-counter"]["dataset"];
let mar2017 = require('./json/steps/march2017Steps.json')["step-counter"]["dataset"];
let apr2017 = require('./json/steps/april2017Steps.json')["step-counter"]["dataset"];
let may2017 = require('./json/steps/may2017Steps.json')["step-counter"]["dataset"];
let jun2017 = require('./json/steps/june2017Steps.json')["step-counter"]["dataset"];
let jul2017 = require('./json/steps/july2017Steps.json')["step-counter"]["dataset"];
let aug2017 = require('./json/steps/august2017Steps.json')["step-counter"]["dataset"];
let sep2017 = require('./json/steps/september2017Steps.json')["step-counter"]["dataset"];
let oct2017 = require('./json/steps/october2017Steps.json')["step-counter"]["dataset"];
let nov2017 = require('./json/steps/november2017Steps.json')["step-counter"]["dataset"];
let dec2017 = require('./json/steps/december2017Steps.json')["step-counter"]["dataset"];


export default class ActivityPage extends React.Component{
	constructor(props) {
		super(props);

		var array = [];
		for ( var i = 0; i < jan2014.length; i++){
			array.push({"x": jan2014[i].day, "y": jan2014[i].steps})
		};

		var array2 = [];
		for ( var i = 0; i < feb2014.length; i++){
			array2.push({"x": feb2014[i].day, "y": feb2014[i].steps})
		};

		var array3 = [];
		for ( var i = 0; i < mar2014.length; i++){
			array3.push({"x": mar2014[i].day, "y": mar2014[i].steps})
		};

		var array4 = [];
		for ( var i = 0; i < apr2014.length; i++){
			array4.push({"x": apr2014[i].day, "y": apr2014[i].steps})
		};

		var array5 = [];
		for ( var i = 0; i < may2014.length; i++){
			array5.push({"x": may2014[i].day, "y": may2014[i].steps})
		};

		var array6 = [];
		for ( var i = 0; i < jun2014.length; i++){
			array6.push({"x": jun2014[i].day, "y": jun2014[i].steps})
		};

		var array45 = [];
		for ( var i = 0; i < jul2014.length; i++){
			array45.push({"x": jul2014[i].day, "y": jul2014[i].steps})
		};

		var array7 = [];
		for ( var i = 0; i < aug2014.length; i++){
			array7.push({"x": aug2014[i].day, "y": aug2014[i].steps})
		};

		var array8 = [];
		for ( var i = 0; i < sep2014.length; i++){
			array8.push({"x": sep2014[i].day, "y": sep2014[i].steps})
		};

		var array9 = [];
		for ( var i = 0; i < oct2014.length; i++){
			array9.push({"x": oct2014[i].day, "y": oct2014[i].steps})
		};

		var array10 = [];
		for ( var i = 0; i < nov2014.length; i++){
			array10.push({"x": nov2014[i].day, "y": nov2014[i].steps})
		};

		var array11 = [];
		for ( var i = 0; i < dec2014.length; i++){
			array11.push({"x": dec2014[i].day, "y": dec2014[i].steps})
		};
		
		var array12 = [];
		for ( var i = 0; i < jan2015.length; i++){
			array12.push({"x": jan2015[i].day, "y": jan2015[i].steps})
		};

		var array13 = [];
		for ( var i = 0; i < feb2015.length; i++){
			array13.push({"x": feb2015[i].day, "y": feb2015[i].steps})
		};

		var array14 = [];
		for ( var i = 0; i < mar2015.length; i++){
			array14.push({"x": mar2015[i].day, "y": mar2015[i].steps})
		};

		var array15 = [];
		for ( var i = 0; i < apr2015.length; i++){
			array15.push({"x": apr2015[i].day, "y": apr2015[i].steps})
		};

		var array16 = [];
		for ( var i = 0; i < may2015.length; i++){
			array16.push({"x": may2015[i].day, "y": may2015[i].steps})
		};

		var array17 = [];
		for ( var i = 0; i < jun2015.length; i++){
			array17.push({"x": jun2015[i].day, "y": jun2015[i].steps})
		};

		var array46 = [];
		for ( var i = 0; i < jul2015.length; i++){
			array46.push({"x": jul2015[i].day, "y": jul2015[i].steps})
		};

		var array18 = [];
		for ( var i = 0; i < aug2015.length; i++){
			array18.push({"x": aug2015[i].day, "y": aug2015[i].steps})
		};

		var array19 = [];
		for ( var i = 0; i < sep2015.length; i++){
			array19.push({"x": sep2015[i].day, "y": sep2015[i].steps})
		};

		var array20 = [];
		for ( var i = 0; i < oct2015.length; i++){
			array20.push({"x": oct2015[i].day, "y": oct2015[i].steps})
		};

		var array21 = [];
		for ( var i = 0; i < nov2015.length; i++){
			array21.push({"x": nov2015[i].day, "y": nov2015[i].steps})
		};

		var array22 = [];
		for ( var i = 0; i < dec2015.length; i++){
			array22.push({"x": dec2015[i].day, "y": dec2015[i].steps})
		};
		
		var array23 = [];
		for ( var i = 0; i < jan2016.length; i++){
			array23.push({"x": jan2016[i].day, "y": jan2016[i].steps})
		};

		var array24 = [];
		for ( var i = 0; i < feb2016.length; i++){
			array24.push({"x": feb2016[i].day, "y": feb2016[i].steps})
		};

		var array25 = [];
		for ( var i = 0; i < mar2016.length; i++){
			array25.push({"x": mar2016[i].day, "y": mar2016[i].steps})
		};

		var array26 = [];
		for ( var i = 0; i < apr2016.length; i++){
			array26.push({"x": apr2016[i].day, "y": apr2016[i].steps})
		};

		var array27 = [];
		for ( var i = 0; i < may2016.length; i++){
			array27.push({"x": may2016[i].day, "y": may2016[i].steps})
		};

		var array28 = [];
		for ( var i = 0; i < jun2016.length; i++){
			array28.push({"x": jun2016[i].day, "y": jun2016[i].steps})
		};

		var array47 = [];
		for ( var i = 0; i < jul2016.length; i++){
			array47.push({"x": jul2016[i].day, "y": jul2016[i].steps})
		};

		var array29 = [];
		for ( var i = 0; i < aug2016.length; i++){
			array29.push({"x": aug2016[i].day, "y": aug2016[i].steps})
		};

		var array30 = [];
		for ( var i = 0; i < sep2016.length; i++){
			array30.push({"x": sep2016[i].day, "y": sep2016[i].steps})
		};

		var array31 = [];
		for ( var i = 0; i < oct2016.length; i++){
			array31.push({"x": oct2016[i].day, "y": oct2016[i].steps})
		};

		var array32 = [];
		for ( var i = 0; i < nov2016.length; i++){
			array32.push({"x": nov2016[i].day, "y": nov2016[i].steps})
		};

		var array33 = [];
		for ( var i = 0; i < dec2016.length; i++){
			array33.push({"x": dec2016[i].day, "y": dec2016[i].steps})
		};
		
		var array34 = [];
		for ( var i = 0; i < jan2017.length; i++){
			array34.push({"x": jan2017[i].day, "y": jan2017[i].steps})
		};

		var array35 = [];
		for ( var i = 0; i < feb2017.length; i++){
			array35.push({"x": feb2017[i].day, "y": feb2017[i].steps})
		};

		var array36 = [];
		for ( var i = 0; i < mar2017.length; i++){
			array36.push({"x": mar2017[i].day, "y": mar2017[i].steps})
		};

		var array37 = [];
		for ( var i = 0; i < apr2017.length; i++){
			array37.push({"x": apr2017[i].day, "y": apr2017[i].steps})
		};

		var array38 = [];
		for ( var i = 0; i < may2017.length; i++){
			array38.push({"x": may2017[i].day, "y": may2017[i].steps})
		};

		var array39 = [];
		for ( var i = 0; i < jun2017.length; i++){
			array39.push({"x": jun2017[i].day, "y": jun2017[i].steps})
		};

		var array48 = [];
		for ( var i = 0; i < jul2017.length; i++){
			array48.push({"x": jul2017[i].day, "y": jul2017[i].steps})
		};

		var array40 = [];
		for ( var i = 0; i < aug2017.length; i++){
			array40.push({"x": aug2017[i].day, "y": aug2017[i].steps})
		};

		var array41 = [];
		for ( var i = 0; i < sep2017.length; i++){
			array41.push({"x": sep2017[i].day, "y": sep2017[i].steps})
		};

		var array42 = [];
		for ( var i = 0; i < oct2017.length; i++){
			array42.push({"x": oct2017[i].day, "y": oct2017[i].steps})
		};

		var array43 = [];
		for ( var i = 0; i < nov2017.length; i++){
			array43.push({"x": nov2017[i].day, "y": nov2017[i].steps})
		};

		var array44 = [];
		for ( var i = 0; i < dec2017.length; i++){
			array44.push({"x": dec2017[i].day, "y": dec2017[i].steps})
		};

		this.handleResize = this.handleResize.bind(this);
		this.onChange = this.onChange.bind(this);
		this.onActive = this.onActive.bind(this);
		this.onClickYear = this.onClickYear.bind(this);
		this.onClickMonth = this.onClickMonth.bind(this);

		this.state = {
			componentWidth: 300,
			selectedYearIndex: 3,
			selectedMonthIndex: 11,
			jan2014: array, feb2014: array2, mar2014: array3, apr2014: array4, may2014: array5, jun2014: array6, jul2014: array45, aug2014: array7, sep2014: array8, oct2014: array9, nov2014: array10, dec2014: array11,
			jan2015: array12, feb2015: array13, mar2015: array14, apr2015: array15, may2015: array16, jun2015: array17, jul2015: array46, aug2015: array18, sep2015: array19, oct2015: array20, nov2015: array21, dec2015: array22,
			jan2016: array23, feb2016: array24, mar2016: array25, apr2016: array26, may2016: array27, jun2016: array28, jul2016: array47, aug2016: array29, sep2016: array30, oct2016: array31, nov2016: array32, dec2016: array33,
			jan2017: array34, feb2017: array35, mar2017: array36, apr2017: array37, may2017: array38, jun2017: array39, jul2017: array48, aug2017: array40, sep2017: array41, oct2017: array42, nov2017: array43, dec2017: array44,
		/*
			avgjan2014: sum / array.length, avgfeb2014: sum / array2.length, avgmar2014: sum / array3.length, avgapr2014: sum / array4.length, avgmay2014: sum / array5.length, avgjun2014: sum / array6.length, avgjul2014: sum / array45.length, avgaug2014: sum / array7.length, avgsep2014: sum / array8.length, avgoct2014: sum / array9.length, avgnov2014: sum / array10.length, avgdec2014: sum / array11,
			avgjan2015: sum / array12.length, avgfeb2015: sum / array13.length, avgmar2015: sum / array14.length, avgapr2015: sum / array15.length, avgmay2015: sum / array16.length, avgjun2015: sum / array17.length, avgjul2015: sum / array46.length, avgaug2015: sum / array18.length, avgsep2015: sum / array19.length, avgoct2015: sum / array20.length, avgnov2015: sum / array21.length, avgdec2015: sum / array22,
			avgjan2016: sum / array23.length, avgfeb2016: sum / array24.length, avgmar2016: sum / array25.length, avgapr2016: sum / array26.length, avgmay2016: sum / array27.length, avgjun2016: sum / array28.length, avgjul2016: sum / array47.length, avgaug2016: sum / array29.length, avgsep2016: sum / array30.length, avgoct2016: sum / array31.length, avgnov2016: sum / array32.length, avgdec2016: sum / array33,
			avgjan2017: sum / array34.length, avgfeb2017: sum / array35.length, avgmar2017: sum / array36.length, avgapr2017: sum / array37.length, avgmay2017: sum / array38.length, avgjun2017: sum / array39.length, avgjul2017: sum / array48.length, avgaug2017: sum / array40.length, avgsep2017: sum / array41.length, avgoct2017: sum / array42.length, avgnov2017: sum / array43.length, avgdec2017: sum / array44
		*/
		};

		
	}

	componentDidMount() {
		window.addEventListener('resize', this.handleResize);
		this.handleResize();
	}
	
	componentWillUnmount() {
		window.removeEventListener('resize', this.handleResize);
	}

	onChange(i, value, tab, ev) {
		console.log(arguments);
	}

	onActive(tab) {
		console.log(arguments);
	}

	handleResize() {
		this.setState({
			windowWidth: window.innerWidth - 100,
			componentWidth: this.myInput.offsetWidth
		});
	}

	onClickYear(ev) {
		let newVal = + !this.state.selectedYearIndex;
		this.setState({selectedYearIndex: newVal});
	}

	onClickMonth(ev) {
		let newVal = + !this.state.selectedMonthIndex;
		this.setState({selectedMonthIndex: newVal});
	}

	render(){
		return(			
			<div class="block" ref={input => {this.myInput = input}}>
				<link href="//cdn.muicss.com/mui-0.9.30/css/mui.min.css" rel="stylesheet" type="text/css" media="screen" />
				<Tabs justified={true} onChange={this.onChange}>
					<Tab value="2014" label="2014">
						<Tabs justified={true}>
							<Tab value="Jan" label="Jan">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.jan2014}
								/>
							</Tab>
							<Tab value="Feb" label="Feb">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.feb2014}
								/>
							</Tab>
							<Tab value="Mar" label="Mar">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.mar2014}
								/>
							</Tab>
							<Tab value="Apr" label="Apr">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.apr2014}
								/>
							</Tab>
							<Tab value="May" label="May">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.may2014}
								/>
							</Tab>
							<Tab value="Jun" label="Jun">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.jun2014}
								/>
							</Tab>
							<Tab value="Jul" label="Jul">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.jul2014}
								/>
							</Tab>
							<Tab value="Aug" label="Aug">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.aug2014}
								/>
							</Tab>
							<Tab value="Sep" label="Sep">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.sep2014}
								/>
							</Tab>
							<Tab value="Oct" label="Oct">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.oct2014}
								/>
							</Tab>
							<Tab value="Nov" label="Nov">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.nov2014}
								/>
							</Tab>
							<Tab value="Dec" label="Dec">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.dec2014}
								/>
							</Tab>
						</Tabs>
					</Tab>
					<Tab value="2015" label="2015">
						<Tabs justified={true}>
							<Tab value="Jan" label="Jan">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.jan2015}
								/>
							</Tab>
							<Tab value="Feb" label="Feb">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.feb2015}
								/>
							</Tab>
							<Tab value="Mar" label="Mar">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.mar2015}
								/>
							</Tab>
							<Tab value="Apr" label="Apr">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.apr2015}
								/>
							</Tab>
							<Tab value="May" label="May">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.may2015}
								/>
							</Tab>
							<Tab value="Jun" label="Jun">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.jun2015}
								/>
							</Tab>
							<Tab value="Jul" label="Jul">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.jul2015}
								/>
							</Tab>
							<Tab value="Aug" label="Aug">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.aug2015}
								/>
							</Tab>
							<Tab value="Sep" label="Sep">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.sep2015}
								/>
							</Tab>
							<Tab value="Oct" label="Oct">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.oct2015}
								/>
							</Tab>
							<Tab value="Nov" label="Nov">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.nov2015}
								/>
							</Tab>
							<Tab value="Dec" label="Dec">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.dec2015}
								/>
							</Tab>
						</Tabs>
					</Tab>
					<Tab value="2016" label="2016" onActive={this.onActive}>
						<Tabs justified={true}>
							<Tab value="Jan" label="Jan">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.jan2016}
								/>
							</Tab>
							<Tab value="Feb" label="Feb">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.feb2016}
								/>
							</Tab>
							<Tab value="Mar" label="Mar">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.mar2016}
								/>
							</Tab>
							<Tab value="Apr" label="Apr">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.apr2016}
								/>
							</Tab>
							<Tab value="May" label="May">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.may2016}
								/>
							</Tab>
							<Tab value="Jun" label="Jun">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.jun2016}
								/>
							</Tab>
							<Tab value="Jul" label="Jul">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.jul2016}
								/>
							</Tab>
							<Tab value="Aug" label="Aug">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.aug2016}
								/>
							</Tab>
							<Tab value="Sep" label="Sep">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.sep2016}
								/>
							</Tab>
							<Tab value="Oct" label="Oct">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.oct2016}
								/>
							</Tab>
							<Tab value="Nov" label="Nov">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.nov2016}
								/>
							</Tab>
							<Tab value="Dec" label="Dec">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.dec2016}
								/>
							</Tab>
						</Tabs>
					</Tab>
					<Tab value="2017" label="2017">
						<Tabs justified={true}>
							<Tab value="Jan" label="Jan">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.jan2017}
								/>
							</Tab>
							<Tab value="Feb" label="Feb">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.feb2017}
								/>
							</Tab>
							<Tab value="Mar" label="Mar">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.mar2017}
								/>
							</Tab>
							<Tab value="Apr" label="Apr">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.apr2017}
								/>
							</Tab>
							<Tab value="May" label="May">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.may2017}
								/>
							</Tab>
							<Tab value="Jun" label="Jun">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.jun2017}
								/>
							</Tab>
							<Tab value="Jul" label="Jul">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.jul2017}
								/>
							</Tab>
							<Tab value="Aug" label="Aug">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.aug2017}
								/>
							</Tab>
							<Tab value="Sep" label="Sep">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.sep2017}
								/>
							</Tab>
							<Tab value="Oct" label="Oct">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.oct2017}
								/>
							</Tab>
							<Tab value="Nov" label="Nov">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.nov2017}
								/>
							</Tab>
							<Tab value="Dec" label="Dec">
								<BarChart
									axes
									grid
									colorBars
									barWidth = {15}
									margin={{ top: 50, right: 0, bottom: 50, left: 80 }}
									width = {this.state.componentWidth - 80}
									height = {this.state.componentWidth / 2}
									axisLabels = {{x: "Day", y: "Number of Steps"}}
									data = {this.state.dec2017}
								/>
							</Tab>
						</Tabs>
					</Tab>
				</Tabs>
			</div>
		);
	}
}