import React from 'react';
import Tile from "../components/includes/Tile";
import Fetch from 'react-fetch';
import ReactSpeedometer from 'react-d3-speedometer';
import Tabs from 'muicss/lib/react/tabs';
import Tab from 'muicss/lib/react/tab';
import './css/mui.tab.css';
/*
let bloodpressure = require('./json/bloodpressure.json');
let bodymassindex = require('./json/bmi.json');
let bodyfat = require('./json/bodyfat.json');
let bodywater = require('./json/bodywater.json');
let heartrate = require('./json/heartrate.json');
let respiratoryrate = require('./json/respiratory.json');
let steps = require('./json/steps.json');
let weight = require('./json/weight.json');
*/
let bloodpressure = require('./json/gaugeData.json')['dataset']['bp'];
let bodymassindex = require('./json/gaugeData.json')['dataset']['bmi'];
let bodyfat = require('./json/gaugeData.json')['dataset']['bfp'];
let bodywater = require('./json/gaugeData.json')['dataset']['bwp'];
let heartrate = require('./json/gaugeData.json')['dataset']['hr'];
let respiratoryrate = require('./json/gaugeData.json')['dataset']['rr'];
let steps = require('./json/gaugeData.json')['dataset']['steps'];
let weight = require('./json/gaugeData.json')['dataset']['weight'];
let sleep = require('./json/gaugeData.json')['dataset']['sleep'];

export default class HealthGauge extends React.Component{
	constructor(props) {
		super(props);
		console.log(bloodpressure);

		var bloodpressureWeek = 0;
		var bloodpressureMonth = 0;
		var bloodpressureYear = 0;
		var bloodpressureOverall = 0;

		for ( var i = 0; i < bloodpressure.length; i++){
			//bloodpressureOverall.push({"value": bloodpressure[i].y})
		};

		for ( var i = bloodpressure.length - 7; i < bloodpressure.length; i++){
			bloodpressureWeek = bloodpressureWeek + bloodpressure[i].value
		};

		bloodpressureWeek = bloodpressureWeek / 7;

		if(bloodpressureWeek >= 105){
			var bPWRange = bloodpressureWeek - 105
		};

		if(bloodpressureWeek <= 105){
			var bPWRange = 105 - bloodpressureWeek
		};

		var bPWValue = (100 - (bPWRange * (100 / 85))).toFixed(2);

		for ( var i = bloodpressure.length - 30; i < bloodpressure.length; i++){
			bloodpressureMonth = bloodpressureMonth + bloodpressure[i].value
		};

		bloodpressureMonth = bloodpressureMonth / 30;

		if(bloodpressureMonth >= 105){
			var bPMRange = bloodpressureMonth - 105
		};

		if(bloodpressureMonth <= 105){
			var bPMRange = 105 - bloodpressureMonth
		};

		var bPMValue = (100 - (bPMRange * (100 / 85))).toFixed(2);

		for ( var i = bloodpressure.length - 365; i < bloodpressure.length; i++){
			bloodpressureYear = bloodpressureYear + bloodpressure[i].value
		};

		bloodpressureYear = bloodpressureYear / 365;

		if(bloodpressureYear >= 105){
			var bPYRange = bloodpressureYear - 105
		};

		if(bloodpressureYear <= 105){
			var bPYRange = 105 - bloodpressureYear
		};

		var bPYValue = (100 - (bPYRange * (100 / 85))).toFixed(2);

		for ( var i = 0; i < bloodpressure.length; i++){
			bloodpressureOverall = bloodpressureOverall + bloodpressure[i].value
		};

		bloodpressureOverall = bloodpressureOverall / bloodpressure.length;

		if(bloodpressureOverall >= 105){
			var bPORange = bloodpressureOverall - 105
		};

		if(bloodpressureOverall <= 105){
			var bPORange = 105 - bloodpressureOverall
		};

		var bPOValue = (100 - (bPORange * (100 / 85))).toFixed(2);

		var bodymassindexWeek = 0;
		var bodymassindexMonth = 0;
		var bodymassindexYear = 0;
		var bodymassindexOverall = 0;

		for ( var i = 0; i < bodymassindex.length; i++){
			//bodymassindexOverall.push({"value": bodymassindex[i].y})
		};

		for ( var i = bodymassindex.length - 7; i < bodymassindex.length; i++){
			bodymassindexWeek = bodymassindexWeek + bodymassindex[i].value
		};

		bodymassindexWeek = bodymassindexWeek / 7;

		if(bodymassindexWeek >= 21.75){
			var bMIWRange = bodymassindexWeek - 21.75
		};

		if(bodymassindexWeek <= 21.75){
			var bMIWRange = 21.75 - bodymassindexWeek
		};

		var bMIWValue = (100 - (bMIWRange * (100 / 18.25))).toFixed(2);

		for ( var i = bodymassindex.length - 30; i < bodymassindex.length; i++){
			bodymassindexMonth = bodymassindexMonth + bodymassindex[i].value
		};

		bodymassindexMonth = bodymassindexMonth / 30;

		if(bodymassindexMonth >= 21.75){
			var bMIMRange = bodymassindexMonth - 21.75
		};

		if(bodymassindexMonth <= 21.75){
			var bMIMRange = 21.75 - bodymassindexMonth
		};

		var bMIMValue = (100 - (bMIMRange * (100 / 18.25))).toFixed(2);

		for ( var i = bodymassindex.length - 365; i < bodymassindex.length; i++){
			bodymassindexYear = bodymassindexYear + bodymassindex[i].value
		};

		bodymassindexYear = bodymassindexYear / 365;

		if(bodymassindexYear >= 21.75){
			var bMIYRange = bodymassindexYear - 21.75
		};

		if(bodymassindexYear <= 21.75){
			var bMIYRange = 21.75 - bodymassindexYear
		};

		var bMIYValue = (100 - (bMIYRange * (100 / 18.25))).toFixed(2);

		for ( var i = 0; i < bodymassindex.length; i++){
			bodymassindexOverall = bodymassindexOverall + bodymassindex[i].value
		};

		bodymassindexOverall = bodymassindexOverall / bodymassindex.length;

		if(bodymassindexOverall >= 21.75){
			var bMIORange = bodymassindexOverall - 21.75
		};

		if(bodymassindexOverall <= 21.75){
			var bMIORange = 21.75 - bodymassindexOverall
		};

		var bMIOValue = (100 - (bMIORange * (100 / 18.25))).toFixed(2);

		var bodyfatWeek = 0;
		var bodyfatMonth = 0;
		var bodyfatYear = 0;
		var bodyfatOverall = 0;

		for ( var i = 0; i < bodyfat.length; i++){
			//bodyfatOverall.push({"value": bodyfat[i].y})
		};

		for ( var i = bodyfat.length - 7; i < bodyfat.length; i++){
			bodyfatWeek = bodyfatWeek + bodyfat[i].value
		};

		bodyfatWeek = bodyfatWeek / 7;

		if(bodyfatWeek >= 14){
			var bFWRange = bodyfatWeek - 14
		};

		if(bodyfatWeek <= 14){
			var bFWRange = 14 - bodyfatWeek
		};

		var bFWValue = (100 - (bFWRange * (100 / 36))).toFixed(2);

		for ( var i = bodyfat.length - 30; i < bodyfat.length; i++){
			bodyfatMonth = bodyfatMonth + bodyfat[i].value
		};

		bodyfatMonth = bodyfatMonth / 30;

		if(bodyfatMonth >= 14){
			var bFMRange = bodyfatMonth - 14
		};

		if(bodyfatMonth <= 14){
			var bFMRange = 14 - bodyfatMonth
		};

		var bFMValue = (100 - (bFMRange * (100 / 36))).toFixed(2);

		for ( var i = bodyfat.length - 365; i < bodyfat.length; i++){
			bodyfatYear = bodyfatYear + bodyfat[i].value
		};

		bodyfatYear = bodyfatYear / 365;

		if(bodyfatYear >= 14){
			var bFYRange = bodyfatYear - 14
		};

		if(bodyfatYear <= 14){
			var bFYRange = 14 - bodyfatYear
		};

		var bFYValue = (100 - (bFYRange * (100 / 36))).toFixed(2);

		for ( var i = 0; i < bodyfat.length; i++){
			bodyfatOverall = bodyfatOverall + bodyfat[i].value
		};

		bodyfatOverall = bodyfatOverall / bodyfat.length;

		if(bodyfatOverall >= 14){
			var bFORange = bodyfatOverall - 14
		};

		if(bodyfatOverall <= 14){
			var bFORange = 14 - bodyfatOverall
		};

		var bFOValue = (100 - (bFORange * (100 / 36))).toFixed(2);

		var bodywaterWeek = 0;
		var bodywaterMonth = 0;
		var bodywaterYear = 0;
		var bodywaterOverall = 0;

		for ( var i = 0; i < bodywater.length; i++){
			//bodywaterOverall.push({"value": bodywater[i].y})
		};

		for ( var i = bodywater.length - 7; i < bodywater.length; i++){
			bodywaterWeek = bodywaterWeek + bodywater[i].value
		};

		bodywaterWeek = bodywaterWeek / 7;

		if(bodywaterWeek >= 63){
			var bWWRange = bodywaterWeek - 63
		};

		if(bodywaterWeek <= 63){
			var bWWRange = 63 - bodywaterWeek
		};

		var bWWValue = (100 - (bWWRange * (100 / 26))).toFixed(2);

		for ( var i = bodywater.length - 30; i < bodywater.length; i++){
			bodywaterMonth = bodywaterMonth + bodywater[i].value
		};

		bodywaterMonth = bodywaterMonth / 30;

		if(bodywaterMonth >= 63){
			var bWMRange = bodywaterMonth - 63
		};

		if(bodywaterMonth <= 63){
			var bWMRange = 63 - bodywaterMonth
		};

		var bWMValue = (100 - (bWMRange * (100 / 26))).toFixed(2);

		for ( var i = bodywater.length - 365; i < bodywater.length; i++){
			bodywaterYear = bodywaterYear + bodywater[i].value
		};

		bodywaterYear = bodywaterYear / 365;

		if(bodywaterYear >= 63){
			var bWYRange = bodywaterYear - 63
		};

		if(bodywaterYear <= 63){
			var bWYRange = 63 - bodywaterYear
		};

		var bWYValue = (100 - (bWYRange * (100 / 26))).toFixed(2);

		for ( var i = 0; i < bodywater.length; i++){
			bodywaterOverall = bodywaterOverall + bodywater[i].value
		};

		bodywaterOverall = bodywaterOverall / bodywater.length;

		if(bodywaterOverall >= 63){
			var bWORange = bodywaterOverall - 63
		};

		if(bodywaterOverall <= 63){
			var bWORange = 63 - bodywaterOverall
		};

		var bWOValue = (100 - (bWORange * (100 / 26))).toFixed(2);

		var heartrateWeek = 0;
		var heartrateMonth = 0;
		var heartrateYear = 0;
		var heartrateOverall = 0;

		for ( var i = 0; i < heartrate.length; i++){
			//heartrateOverall.push({"value": heartrate[i].y})
		};

		for ( var i = heartrate.length - 7; i < heartrate.length; i++){
			heartrateWeek = heartrateWeek + heartrate[i].value
		};

		heartrateWeek = heartrateWeek / 7;

		if(heartrateWeek >= 50){
			var hRWRange = heartrateWeek - 50
		};

		if(heartrateWeek <= 50){
			var hRWRange = 50 - heartrateWeek
		};

		var hRWValue = (100 - (hRWRange * (100 / 35))).toFixed(2);

		for ( var i = heartrate.length - 30; i < heartrate.length; i++){
			heartrateMonth = heartrateMonth + heartrate[i].value
		};

		heartrateMonth = heartrateMonth / 30;

		if(heartrateMonth >= 50){
			var hRMRange = heartrateMonth - 50
		};

		if(heartrateMonth <= 50){
			var hRMRange = 50 - heartrateMonth
		};

		var hRMValue = (100 - (hRMRange * (100 / 35))).toFixed(2);

		for ( var i = heartrate.length - 365; i < heartrate.length; i++){
			heartrateYear = heartrateYear + heartrate[i].value
		};

		heartrateYear = heartrateYear / 365;

		if(heartrateYear >= 50){
			var hRYRange = heartrateYear - 50
		};

		if(heartrateYear <= 50){
			var hRYRange = 50 - heartrateYear
		};

		var hRYValue = (100 - (hRYRange * (100 / 35))).toFixed(2);

		for ( var i = 0; i < heartrate.length; i++){
			heartrateOverall = heartrateOverall + heartrate[i].value
		};

		heartrateOverall = heartrateOverall / heartrate.length;

		if(heartrateOverall >= 50){
			var hRORange = heartrateOverall - 50
		};

		if(heartrateOverall <= 50){
			var hRORange = 50 - heartrateOverall
		};

		var hROValue = (100 - (hRORange * (100 / 35))).toFixed(2);

		var respiratoryrateWeek = 0;
		var respiratoryrateMonth = 0;
		var respiratoryrateYear = 0;
		var respiratoryrateOverall = 0;

		for ( var i = 0; i < respiratoryrate.length; i++){
			//respiratoryrateOverall.push({"value": respiratoryrate[i].y})
		};

		for ( var i = respiratoryrate.length - 7; i < respiratoryrate.length; i++){
			respiratoryrateWeek = respiratoryrateWeek + respiratoryrate[i].value
		};

		respiratoryrateWeek = respiratoryrateWeek / 7;

		if(respiratoryrateWeek >= 15){
			var rRWRange = respiratoryrateWeek - 15
		};

		if(respiratoryrateWeek <= 15){
			var rRWRange = 15 - respiratoryrateWeek
		};

		var rRWValue = (100 - (rRWRange * (100 / 20))).toFixed(2);

		for ( var i = respiratoryrate.length - 30; i < respiratoryrate.length; i++){
			respiratoryrateMonth = respiratoryrateMonth + respiratoryrate[i].value
		};

		respiratoryrateMonth = respiratoryrateMonth / 30;

		if(respiratoryrateMonth >= 15){
			var rRMRange = respiratoryrateMonth - 15
		};

		if(respiratoryrateMonth <= 15){
			var rRMRange = 15 - respiratoryrateMonth
		};

		var rRMValue = (100 - (rRMRange * (100 / 20))).toFixed(2);

		for ( var i = respiratoryrate.length - 365; i < respiratoryrate.length; i++){
			respiratoryrateYear = respiratoryrateYear + respiratoryrate[i].value
		};

		respiratoryrateYear = respiratoryrateYear / 365;

		if(respiratoryrateYear >= 15){
			var rRYRange = respiratoryrateYear - 15
		};

		if(respiratoryrateYear <= 15){
			var rRYRange = 15 - respiratoryrateYear
		};

		var rRYValue = (100 - (rRYRange * (100 / 20))).toFixed(2);

		for ( var i = 0; i < respiratoryrate.length; i++){
			respiratoryrateOverall = respiratoryrateOverall + respiratoryrate[i].value
		};

		respiratoryrateOverall = respiratoryrateOverall / respiratoryrate.length;

		if(respiratoryrateOverall >= 15){
			var rRORange = respiratoryrateOverall - 15
		};

		if(respiratoryrateOverall <= 15){
			var rRORange = 15 - respiratoryrateOverall
		};

		var rROValue = (100 - (rRORange * (100 / 20))).toFixed(2);

		var stepsWeek = 0;
		var stepsMonth = 0;
		var stepsYear = 0;
		var stepsOverall = 0;

		for ( var i = 0; i < steps.length; i++){
			//stepsOverall.push({"value": steps[i].y})
		};

		for ( var i = steps.length - 7; i < steps.length; i++){
			stepsWeek = stepsWeek + steps[i].value
		};

		stepsWeek = stepsWeek / 7;

		if(stepsWeek >= 20000){
			stepsWeek = 20000
			var sWRange = stepsWeek - 20000
		};

		if(stepsWeek <= 20000){
			var sWRange = 20000 - stepsWeek
		};

		var sWValue = (100 - (sWRange * (100 / 20000))).toFixed(2);

		for ( var i = steps.length - 30; i < steps.length; i++){
			stepsMonth = stepsMonth + steps[i].value
		};

		stepsMonth = stepsMonth / 30;

		if(stepsMonth >= 20000){
			stepsMonth = 20000
			var sMRange = stepsMonth - 20000
		};

		if(stepsMonth <= 20000){
			var sMRange = 20000 - stepsMonth
		};

		var sMValue = (100 - (sMRange * (100 / 20000))).toFixed(2);

		for ( var i = steps.length - 365; i < steps.length; i++){
			stepsYear = stepsYear + steps[i].value
		};

		stepsYear = stepsYear / 365;

		if(stepsYear >= 20000){
			stepsYear = 20000
			var sYRange = stepsYear - 20000
		};

		if(stepsYear <= 20000){
			var sYRange = 20000 - stepsYear
		};

		var sYValue = (100 - (sYRange * (100 / 20000))).toFixed(2);

		for ( var i = 0; i < steps.length; i++){
			stepsOverall = stepsOverall + steps[i].value
		};

		stepsOverall = stepsOverall / steps.length;

		if(stepsOverall >= 20000){
			stepsOverall = 20000
			var sORange = stepsOverall - 20000
		};

		if(stepsOverall <= 20000){
			var sORange = 20000 - stepsOverall
		};

		var sOValue = (100 - (sORange * (100 / 20000))).toFixed(2);

		var weightWeek = 0;
		var weightMonth = 0;
		var weightYear = 0;
		var weightOverall = 0;

		for ( var i = 0; i < weight.length; i++){
			//weightOverall.push({"value": weight[i].y})
		};

		for ( var i = weight.length - 7; i < weight.length; i++){
			weightWeek = weightWeek + weight[i].value
		};

		weightWeek = weightWeek / 7;

		if(weightWeek >= 151){
			var wWRange = weightWeek - 151
		};

		if(weightWeek <= 151){
			var wWRange = 151 - weightWeek
		};

		var wWValue = (100 - (wWRange * ((56) / 100))).toFixed(2);

		for ( var i = weight.length - 30; i < weight.length; i++){
			weightMonth = weightMonth + weight[i].value
		};

		weightMonth = weightMonth / 30;

		if(weightMonth >= 151){
			var wMRange = weightMonth - 151
		};

		if(weightMonth <= 151){
			var wMRange = 151 - weightMonth
		};

		var wMValue = (100 - (wMRange * (56 / 100))).toFixed(2);

		for ( var i = weight.length - 365; i < weight.length; i++){
			weightYear = weightYear + weight[i].value
		};

		weightYear = weightYear / 365;

		if(weightYear >= 151){
			var wYRange = weightYear - 151
		};

		if(weightYear <= 151){
			var wYRange = 151 - weightYear
		};

		var wYValue = (100 - (wYRange * (56 / 100))).toFixed(2);

		for ( var i = 0; i < weight.length; i++){
			weightOverall = weightOverall + weight[i].value
		};

		weightOverall = weightOverall / weight.length;

		if(weightOverall >= 151){
			var wORange = weightOverall - 151
		};

		if(weightOverall <= 151){
			var wORange = 151 - weightOverall
		};

		var wOValue = (100 - (wORange * (56 / 100))).toFixed(2);

		var sleepWeek = 0;
		var sleepMonth = 0;
		var sleepYear = 0;
		var sleepOverall = 0;
		for ( var i = 0; i < sleep.length; i++){
			//sleepOverall.push({"value": sleep[i].y})
		};

		for ( var i = sleep.length - 7; i < sleep.length; i++){
			sleepWeek = sleepWeek + sleep[i].value
		};

		sleepWeek = sleepWeek / 7;

		if(sleepWeek >= 11){
			var slWRange = sleepWeek - 11
		};

		if(sleepWeek <= 11){
			var slWRange = 11 - sleepWeek
		};

		var slWValue = (100 - (slWRange * ((11) / 100))).toFixed(2);

		for ( var i = sleep.length - 30; i < sleep.length; i++){
			sleepMonth = sleepMonth + sleep[i].value
		};

		sleepMonth = sleepMonth / 30;

		if(sleepMonth >= 11){
			var slMRange = sleepMonth - 11
		};

		if(sleepMonth <= 11){
			var slMRange = 11 - sleepMonth
		};

		var slMValue = (100 - (slMRange * (11 / 100))).toFixed(2);

		for ( var i = sleep.length - 365; i < sleep.length; i++){
			sleepYear = sleepYear + sleep[i].value
		};

		sleepYear = sleepYear / 365;

		if(sleepYear >= 11){
			var slYRange = sleepYear - 11
		};

		if(sleepYear <= 11){
			var slYRange = 11 - sleepYear
		};

		var slYValue = (100 - (slYRange * (11 / 100))).toFixed(2);

		for ( var i = 0; i < sleep.length; i++){
			sleepOverall = sleepOverall + sleep[i].value
		};

		sleepOverall = sleepOverall / sleep.length;

		if(sleepOverall >= 11){
			var slORange = sleepOverall - 11
		};

		if(sleepOverall <= 11){
			var slORange = 11 - sleepOverall
		};

		var slOValue = (100 - (slORange * (11 / 100))).toFixed(2);

		var overallW = ((Number(bPWValue) + Number(bMIWValue) + Number(bFWValue) + Number(hRWValue) + Number(sWValue) + Number(wWValue) + Number(slWValue)) / 7);
		var overallM = ((Number(bPMValue) + Number(bMIMValue) + Number(bFMValue) + Number(hRMValue) + Number(sMValue) + Number(wMValue) + Number(slMValue)) / 7);
		var overallY = ((Number(bPYValue) + Number(bMIYValue) + Number(bFYValue) + Number(hRYValue) + Number(sYValue) + Number(wYValue) + Number(slYValue)) / 7);
		var overallO = ((Number(bPOValue) + Number(bMIOValue) + Number(bFOValue) + Number(hROValue) + Number(sOValue) + Number(wOValue) + Number(slOValue)) / 7);

		this.state = {
			componentWidth: window.innerWidth - 100,
			componentHeight: window.innerHeight - 100,
			windowHeight: window.innerHeight - 100,
			bPW: bPWValue, bPM: bPMValue, bPY: bPYValue, bPO: bPOValue,
			bMIW: bMIWValue, bMIM: bMIMValue, bMIY: bMIYValue, bMIO: bMIOValue,
			bFW: bFWValue, bFM: bFMValue, bFY: bFYValue, bFO: bFOValue,
			bWW: bWWValue, bWM: bWMValue, bWY: bWYValue, bWO: bWOValue,
			hRW: hRWValue, hRM: hRMValue, hRY: hRYValue, hRO: hROValue,
			rRW: rRWValue, rRM: rRMValue, rRY: rRYValue, rRO: rROValue,
			sW: sWValue, sM: sMValue, sY: sYValue, sO: sOValue,
			wW: wWValue, wM: wMValue, wY: wYValue, wO: wOValue,
			slW: slWValue, slM: slMValue, slY: slYValue, slO: slOValue, 
			oW: overallW, oM: overallM, oY: overallY, oO: overallO,
		};

		this.handleResize = this.handleResize.bind(this);
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

	render(){
	    return(
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-lg-15" ref="block">
						<div class="block" ref={input => {this.myInput = input}}>
							<link href="../../../css/mui.min.css" rel="stylesheet" type="text/css" media="screen" />
							<Tabs justified={true} onChange={this.onChange}>
								<Tab value="Week" label="Week">
									<Tabs justified={true} onChange={this.onChange}>
										<Tab value="Overall" label="Overall">
											<ReactSpeedometer
												value={this.state.oW}
												minValue={0}
												maxValue={100}
												ringWidth={100}
												forceRender={true}
												segments={5}
												needleColor={'#5DADE2'}
												width={this.state.componentWidth - 20}
												height={this.state.componentWidth * 0.53}
												needleTransition="easeElastic"
											/>
										</Tab>
										<Tab value="Vitals" label="Vitals">
											<Tabs justified={true} onChange={this.onChange}>
												<Tab value="Heart Rate" label="Heart Rate">
													<ReactSpeedometer
														value={this.state.hRW}
														minValue={0}
														maxValue={100}
														ringWidth={100}
														forceRender={true}
														segments={5}
														needleColor={'#5DADE2'}
														width={this.state.componentWidth - 20}
														height={this.state.componentWidth * 0.53}
														needleTransition="easeElastic"
													/>
												</Tab>
												<Tab value="Blood Pressure" label="Blood Pressure">
													<ReactSpeedometer
														value={this.state.bPW}
														minValue={0}
														maxValue={100}
														ringWidth={100}
														forceRender={true}
														segments={5}
														needleColor={'#5DADE2'}
														width={this.state.componentWidth - 20}
														height={this.state.componentWidth * 0.53}
														needleTransition="easeElastic"
													/>	
												</Tab>
												<Tab value="Respiratory Rate" label="Respiratory Rate">
													<ReactSpeedometer
														value={this.state.rRW}
														minValue={0}
														maxValue={100}
														ringWidth={100}
														forceRender={true}
														segments={5}
														needleColor={'#5DADE2'}
														width={this.state.componentWidth - 20}
														height={this.state.componentWidth * 0.53}
														needleTransition="easeElastic"
													/>
												</Tab>
											</Tabs>
										</Tab>
										<Tab value="Body" label="Body">
											<Tabs justified={true} onChange={this.onChange}>
												<Tab value="Weight" label="Weight">
													<ReactSpeedometer
														value={this.state.wW}
														minValue={0}
														maxValue={100}
														ringWidth={100}
														forceRender={true}
														segments={5}
														needleColor={'#5DADE2'}
														width={this.state.componentWidth - 20}
														height={this.state.componentWidth * 0.53}
														needleTransition="easeElastic"
													/>
												</Tab>
												<Tab value="BMI" label="BMI">
													<ReactSpeedometer
														value={this.state.bMIW}
														minValue={0}
														maxValue={100}
														ringWidth={100}
														forceRender={true}
														segments={5}
														needleColor={'#5DADE2'}
														width={this.state.componentWidth - 20}
														height={this.state.componentWidth * 0.53}
														needleTransition="easeElastic"
													/>
												</Tab>
											</Tabs>
										</Tab>
										<Tab value="Activity" label="Activity">
											<Tabs justified={true} onChange={this.onChange}>
												<Tab value="Steps" label="Steps">
													<ReactSpeedometer
														value={this.state.sW}
														minValue={0}
														maxValue={100}
														ringWidth={100}
														forceRender={true}
														segments={5}
														needleColor={'#5DADE2'}
														width={this.state.componentWidth - 20}
														height={this.state.componentWidth * 0.53}
														needleTransition="easeElastic"
													/>
												</Tab>
												<Tab value="Sleep" label="Sleep">
													<ReactSpeedometer
														value={this.state.slW}
														minValue={0}
														maxValue={100}
														ringWidth={100}
														forceRender={true}
														segments={5}
														needleColor={'#5DADE2'}
														width={this.state.componentWidth - 20}
														height={this.state.componentWidth * 0.53}
														needleTransition="easeElastic"
													/>
												</Tab>
											</Tabs>
										</Tab>
									</Tabs>
								</Tab>
								<Tab value="Month" label="Month">
									<Tabs justified={true} onChange={this.onChange}>
										<Tab value="Overall" label="Overall">
											<ReactSpeedometer
												value={this.state.oM}
												minValue={0}
												maxValue={100}
												ringWidth={100}
												forceRender={true}
												segments={5}
												needleColor={'#5DADE2'}
												width={this.state.componentWidth - 20}
												height={this.state.componentWidth * 0.53}
												needleTransition="easeElastic"
											/>
										</Tab>
										<Tab value="Vitals" label="Vitals">
											<Tabs justified={true} onChange={this.onChange}>
												<Tab value="Heart Rate" label="Heart Rate">
													<ReactSpeedometer
														value={this.state.hRM}
														minValue={0}
														maxValue={100}
														ringWidth={100}
														forceRender={true}
														segments={5}
														needleColor={'#5DADE2'}
														width={this.state.componentWidth - 20}
														height={this.state.componentWidth * 0.53}
														needleTransition="easeElastic"
													/>
												</Tab>
												<Tab value="Blood Pressure" label="Blood Pressure">
													<ReactSpeedometer
														value={this.state.bPM}
														minValue={0}
														maxValue={100}
														ringWidth={100}
														forceRender={true}
														segments={5}
														needleColor={'#5DADE2'}
														width={this.state.componentWidth - 20}
														height={this.state.componentWidth * 0.53}
														needleTransition="easeElastic"
													/>
												</Tab>
												<Tab value="Respiratory Rate" label="Respiratory Rate">
													<ReactSpeedometer
														value={this.state.rRM}
														minValue={0}
														maxValue={100}
														ringWidth={100}
														forceRender={true}
														segments={5}
														needleColor={'#5DADE2'}
														width={this.state.componentWidth - 20}
														height={this.state.componentWidth * 0.53}
														needleTransition="easeElastic"
													/>
												</Tab>
											</Tabs>
										</Tab>
										<Tab value="Body" label="Body">
											<Tabs justified={true} onChange={this.onChange}>
												<Tab value="Weight" label="Weight">
													<ReactSpeedometer
														value={this.state.wM}
														minValue={0}
														maxValue={100}
														ringWidth={100}
														forceRender={true}
														segments={5}
														needleColor={'#5DADE2'}
														width={this.state.componentWidth - 20}
														height={this.state.componentWidth * 0.53}
														needleTransition="easeElastic"
													/>
												</Tab>
												<Tab value="BMI" label="BMI">
													<ReactSpeedometer
														value={this.state.bMIM}
														minValue={0}
														maxValue={100}
														ringWidth={100}
														forceRender={true}
														segments={5}
														needleColor={'#5DADE2'}
														width={this.state.componentWidth - 20}
														height={this.state.componentWidth * 0.53}
														needleTransition="easeElastic"
													/>
												</Tab>
											</Tabs>
										</Tab>
										<Tab value="Activity" label="Activity">
											<Tabs justified={true} onChange={this.onChange}>
												<Tab value="Steps" label="Steps">
													<ReactSpeedometer
														value={this.state.sM}
														minValue={0}
														maxValue={100}
														ringWidth={100}
														forceRender={true}
														segments={5}
														needleColor={'#5DADE2'}
														width={this.state.componentWidth - 20}
														height={this.state.componentWidth * 0.53}
														needleTransition="easeElastic"
													/>
												</Tab>
												<Tab value="Sleep" label="Sleep">
													<ReactSpeedometer
														value={this.state.slM}
														minValue={0}
														maxValue={100}
														ringWidth={100}
														forceRender={true}
														segments={5}
														needleColor={'#5DADE2'}
														width={this.state.componentWidth - 20}
														height={this.state.componentWidth * 0.53}
														needleTransition="easeElastic"
													/>
												</Tab>
											</Tabs>
										</Tab>
									</Tabs>
								</Tab>
								<Tab value="Year" label="Year">
									<Tabs justified={true} onChange={this.onChange}>
										<Tab value="Overall" label="Overall">
											<ReactSpeedometer
												value={this.state.oY}
												minValue={0}
												maxValue={100}
												ringWidth={100}
												forceRender={true}
												segments={5}
												needleColor={'#5DADE2'}
												width={this.state.componentWidth - 20}
												height={this.state.componentWidth * 0.53}
												needleTransition="easeElastic"
											/>
										</Tab>
										<Tab value="Vitals" label="Vitals">
											<Tabs justified={true} onChange={this.onChange}>
												<Tab value="Heart Rate" label="Heart Rate">
													<ReactSpeedometer
														value={this.state.hRY}
														minValue={0}
														maxValue={100}
														ringWidth={100}
														forceRender={true}
														segments={5}
														needleColor={'#5DADE2'}
														width={this.state.componentWidth - 20}
														height={this.state.componentWidth * 0.53}
														needleTransition="easeElastic"
													/>
												</Tab>
												<Tab value="Blood Pressure" label="Blood Pressure">
													<ReactSpeedometer
														value={this.state.bPY}
														minValue={0}
														maxValue={100}
														ringWidth={100}
														forceRender={true}
														segments={5}
														needleColor={'#5DADE2'}
														width={this.state.componentWidth - 20}
														height={this.state.componentWidth * 0.53}
														needleTransition="easeElastic"
													/>	
												</Tab>
												<Tab value="Respiratory Rate" label="Respiratory Rate">
													<ReactSpeedometer
														value={this.state.rRY}
														minValue={0}
														maxValue={100}
														ringWidth={100}
														forceRender={true}
														segments={5}
														needleColor={'#5DADE2'}
														width={this.state.componentWidth - 20}
														height={this.state.componentWidth * 0.53}
														needleTransition="easeElastic"
													/>
												</Tab>
											</Tabs>
										</Tab>
										<Tab value="Body" label="Body">
											<Tabs justified={true} onChange={this.onChange}>
												<Tab value="Weight" label="Weight">
													<ReactSpeedometer
														value={this.state.wO}
														minValue={0}
														maxValue={100}
														ringWidth={100}
														forceRender={true}
														segments={5}
														needleColor={'#5DADE2'}
														width={this.state.componentWidth - 20}
														height={this.state.componentWidth * 0.53}
														needleTransition="easeElastic"
													/>
												</Tab>
												<Tab value="BMI" label="BMI">
													<ReactSpeedometer
														value={this.state.bMIY}
														minValue={0}
														maxValue={100}
														ringWidth={100}
														forceRender={true}
														segments={5}
														needleColor={'#5DADE2'}
														width={this.state.componentWidth - 20}
														height={this.state.componentWidth * 0.53}
														needleTransition="easeElastic"
													/>
												</Tab>
											</Tabs>
										</Tab>
										<Tab value="Activity" label="Activity">
											<Tabs justified={true} onChange={this.onChange}>
												<Tab value="Steps" label="Steps">
													<ReactSpeedometer
														value={this.state.sY}
														minValue={0}
														maxValue={100}
														ringWidth={100}
														forceRender={true}
														segments={5}
														needleColor={'#5DADE2'}
														width={this.state.componentWidth - 20}
														height={this.state.componentWidth * 0.53}
														needleTransition="easeElastic"
													/>
												</Tab>
												<Tab value="Sleep" label="Sleep">
													<ReactSpeedometer
														value={this.state.slY}
														minValue={0}
														maxValue={100}
														ringWidth={100}
														forceRender={true}
														segments={5}
														needleColor={'#5DADE2'}
														width={this.state.componentWidth - 20}
														height={this.state.componentWidth * 0.53}
														needleTransition="easeElastic"
													/>
												</Tab>
											</Tabs>
										</Tab>
									</Tabs>
								</Tab>
								<Tab value="All Time" label="All Time">
									<Tabs justified={true} onChange={this.onChange}>
										<Tab value="Overall" label="Overall">
											<ReactSpeedometer
												value={this.state.oO}
												minValue={0}
												maxValue={100}
												ringWidth={100}
												forceRender={true}
												segments={5}
												needleColor={'#5DADE2'}
												width={this.state.componentWidth - 20}
												height={this.state.componentWidth * 0.53}
												needleTransition="easeElastic"
											/>
										</Tab>
										<Tab value="Vitals" label="Vitals">
											<Tabs justified={true} onChange={this.onChange}>
												<Tab value="Heart Rate" label="Heart Rate">
													<ReactSpeedometer
														value={this.state.hRO}
														minValue={0}
														maxValue={100}
														ringWidth={100}
														forceRender={true}
														segments={5}
														needleColor={'#5DADE2'}
														width={this.state.componentWidth - 20}
														height={this.state.componentWidth * 0.53}
														needleTransition="easeElastic"
													/>
												</Tab>
												<Tab value="Blood Pressure" label="Blood Pressure">
													<ReactSpeedometer
														value={this.state.bPO}
														minValue={0}
														maxValue={100}
														ringWidth={100}
														forceRender={true}
														segments={5}
														needleColor={'#5DADE2'}
														width={this.state.componentWidth - 20}
														height={this.state.componentWidth * 0.53}
														needleTransition="easeElastic"
													/>	
												</Tab>
												<Tab value="Respiratory Rate" label="Respiratory Rate">
													<ReactSpeedometer
														value={this.state.rRO}
														minValue={0}
														maxValue={100}
														ringWidth={100}
														forceRender={true}
														segments={5}
														needleColor={'#5DADE2'}
														width={this.state.componentWidth - 20}
														height={this.state.componentWidth * 0.53}
														needleTransition="easeElastic"
													/>
												</Tab>
											</Tabs>
										</Tab>
										<Tab value="Body" label="Body">
											<Tabs justified={true} onChange={this.onChange}>
												<Tab value="Weight" label="Weight">
													<ReactSpeedometer
														value={this.state.wO}
														minValue={0}
														maxValue={100}
														ringWidth={100}
														forceRender={true}
														segments={5}
														needleColor={'#5DADE2'}
														width={this.state.componentWidth - 20}
														height={this.state.componentWidth * 0.53}
														needleTransition="easeElastic"
													/>
												</Tab>
												<Tab value="BMI" label="BMI">
													<ReactSpeedometer
														value={this.state.bMIO}
														minValue={0}
														maxValue={100}
														ringWidth={100}
														forceRender={true}
														segments={5}
														needleColor={'#5DADE2'}
														width={this.state.componentWidth - 20}
														height={this.state.componentWidth * 0.53}
														needleTransition="easeElastic"
													/>
												</Tab>
											</Tabs>
										</Tab>
										<Tab value="Activity" label="Activity">
											<Tabs justified={true} onChange={this.onChange}>
												<Tab value="Steps" label="Steps">
													<ReactSpeedometer
														value={this.state.sO}
														minValue={0}
														maxValue={100}
														ringWidth={100}
														forceRender={true}
														segments={5}
														needleColor={'#5DADE2'}
														width={this.state.componentWidth - 20}
														height={this.state.componentWidth * 0.53}
														needleTransition="easeElastic"
													/>
												</Tab>
												<Tab value="Sleep" label="Sleep">
													<ReactSpeedometer
														value={this.state.slO}
														minValue={0}
														maxValue={100}
														ringWidth={100}
														forceRender={true}
														segments={5}
														needleColor={'#5DADE2'}
														width={this.state.componentWidth - 20}
														height={this.state.componentWidth * 0.53}
														needleTransition="easeElastic"
													/>
												</Tab>
											</Tabs>
										</Tab>
									</Tabs>
								</Tab>
							</Tabs>
						</div>
					</div>
				</div> 
			</div>
		);
	}
}

