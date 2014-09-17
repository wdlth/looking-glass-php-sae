<script type="text/javascript">
$(document).ready(function () {
	Highcharts.setOptions({
		lang: {
			contextButtonTitle: '菜单',
			downloadJPEG: '下载JPG图片',
			downloadPDF: '下载PDF文档',
			downloadPNG: '下载PNG图片',
			downloadSVG: '下载SVG图像',
			loading: '载入中...',
			printChart: '打印图表',
			resetZoom: '重置缩放',
			resetZoomTitle: '重置缩放到1:1'
		}
	});

    var options_telecom = {
		chart: {
			renderTo: 'chinatelecom',
			type: 'line',
			zoomType: 'xy'
		},
		exporting: {
			filename: "Telecom_" + Date.now(),
			width: 1080
		},
		title: {
			text: 'Looking Glass',
			x: -20
		},
		subtitle: {
			text: '最新数据',
			x: -20
		},
		credits: {
			enabled: true,
			text: '网络观察镜',
			href: 'http://lg.wdlth.com'
		},
		xAxis: {
			categories: []
		},
		yAxis: [{
			labels: {
				format: '{value}ms',
			},
			title: {
				text: '平均延迟(ms)'
			},
			plotLines: [{
				value: 0,
				width: 1,
				color: '#66ccff'
			}]
		},{
			labels: {
				format: '{value}%',
			},
			title: {
				text: '丢包率(%)'
			},
			opposite: true,
			plotLines: [{
				value: 0,
				width: 1,
				color: '#ff0000'
			}]
		}],
		tooltip: {
			shared: true
		},
		plotOptions: {
			line: {
				dataLabels: {
					enabled: true
				},
			}
		},
		legend: {
			layout: 'vertical',
			align: 'right',
			verticalAlign: 'middle',
			borderWidth: 0
		},
		series: []
	};
	
	var options_unicom = {
		chart: {
			renderTo: 'chinaunicom',
			type: 'line',
			zoomType: 'xy'
		},
		exporting: {
			filename: "Unicom_" + Date.now(),
			width: 1080
		},
		title: {
			text: 'Looking Glass',
			x: -20
		},
		subtitle: {
			text: '最新数据',
			x: -20
		},
		credits: {
			enabled: true,
			text: '网络观察镜',
			href: 'http://lg.wdlth.com'
		},
		xAxis: {
			categories: []
		},
		yAxis: [{
			labels: {
				format: '{value}ms',
			},
			title: {
				text: '平均延迟(ms)'
			},
			plotLines: [{
				value: 0,
				width: 1,
				color: '#66ccff'
			}]
		},{
			labels: {
				format: '{value}%',
			},
			title: {
				text: '丢包率(%)'
			},
			opposite: true,
			plotLines: [{
				value: 0,
				width: 1,
				color: '#ff0000'
			}]
		}],
		tooltip: {
			shared: true
		},
		plotOptions: {
			line: {
				dataLabels: {
					enabled: true
				},
			}
		},
		legend: {
			layout: 'vertical',
			align: 'right',
			verticalAlign: 'middle',
			borderWidth: 0
		},
		series: []
	};
	
	var options_mobile = {
		chart: {
			renderTo: 'chinamobile',
			type: 'line',
			zoomType: 'xy'
		},
		exporting: {
			filename: "Mobile_" + Date.now(),
			width: 1080
		},
		title: {
			text: 'Looking Glass',
			x: -20
		},
		subtitle: {
			text: '最新数据',
			x: -20
		},
		credits: {
			enabled: true,
			text: '网络观察镜',
			href: 'http://lg.wdlth.com'
		},
		xAxis: {
			categories: []
		},
		yAxis: [{
			labels: {
				format: '{value}ms',
			},
			title: {
				text: '平均延迟(ms)'
			},
			plotLines: [{
				value: 0,
				width: 1,
				color: '#66ccff'
			}]
		},{
			labels: {
				format: '{value}%',
			},
			title: {
				text: '丢包率(%)'
			},
			opposite: true,
			plotLines: [{
				value: 0,
				width: 1,
				color: '#ff0000'
			}]
		}],
		tooltip: {
			shared: true
		},
		plotOptions: {
			line: {
				dataLabels: {
					enabled: true
				},
			}
		},
		legend: {
			layout: 'vertical',
			align: 'right',
			verticalAlign: 'middle',
			borderWidth: 0
		},
		series: []
	};
	
	$.get('/chart/telecom', function(xml) {
		var $xml = $(xml);
		
		$xml.find('categories item').each(function(i, category) {
			options_telecom.xAxis.categories.push($(category).text());
		});
		
		$xml.find('series').each(function(i, series) {
			var seriesOptions = {
				name: $(series).find('name').text(),
				data: [],
				tooltip: {
					valueSuffix: 'ms'
				}
			};
			var seriesOptions2 = {
				type: 'column',
				name: $(series).find('name').text(),
				data: [],
				yAxis: 1,
				tooltip: {
					valueSuffix: '%'
				}
			};
			$(series).find('data point').each(function(i, point) {
				seriesOptions.data.push(
				parseInt($(point).text())
				);
			});
			$(series).find('data loss').each(function(i, loss) {
				seriesOptions2.data.push(
				parseInt($(loss).text())
				);
			});
			options_telecom.series.push(seriesOptions);
			options_telecom.series.push(seriesOptions2);
		});
		var chart = new Highcharts.Chart(options_telecom);
	});
	
	$.get('/chart/unicom', function(xml) {
		var $xml = $(xml);
		
		$xml.find('categories item').each(function(i, category) {
			options_unicom.xAxis.categories.push($(category).text());
		});
		
		$xml.find('series').each(function(i, series) {
			var seriesOptions = {
				name: $(series).find('name').text(),
				data: [],
				tooltip: {
					valueSuffix: 'ms'
				}
			};
			var seriesOptions2 = {
				type: 'column',
				name: $(series).find('name').text(),
				data: [],
				yAxis: 1,
				tooltip: {
					valueSuffix: '%'
				}
			};
			$(series).find('data point').each(function(i, point) {
				seriesOptions.data.push(
				parseInt($(point).text())
				);
			});
			$(series).find('data loss').each(function(i, loss) {
				seriesOptions2.data.push(
				parseInt($(loss).text())
				);
			});
			options_unicom.series.push(seriesOptions);
			options_unicom.series.push(seriesOptions2);
		});
		var chart = new Highcharts.Chart(options_unicom);
	});
	
	$.get('/chart/mobile', function(xml) {
		var $xml = $(xml);
		
		$xml.find('categories item').each(function(i, category) {
			options_mobile.xAxis.categories.push($(category).text());
		});
		
		$xml.find('series').each(function(i, series) {
			var seriesOptions = {
				name: $(series).find('name').text(),
				data: [],
				tooltip: {
					valueSuffix: 'ms'
				}
			};
			var seriesOptions2 = {
				type: 'column',
				name: $(series).find('name').text(),
				data: [],
				yAxis: 1,
				tooltip: {
					valueSuffix: '%'
				}
			};
			$(series).find('data point').each(function(i, point) {
				seriesOptions.data.push(
				parseInt($(point).text())
				);
			});
			$(series).find('data loss').each(function(i, loss) {
				seriesOptions2.data.push(
				parseInt($(loss).text())
				);
			});
			options_mobile.series.push(seriesOptions);
			options_mobile.series.push(seriesOptions2);
		});
		var chart = new Highcharts.Chart(options_mobile);
	});
		
});
</script>