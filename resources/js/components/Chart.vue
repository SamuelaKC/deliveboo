<template>
  <div>
    <canvas id="myChart" width="400" height="400"></canvas>
  </div>
</template>

<script>
import Chart from 'chart.js/auto'
export default {
  props: {
    labels: String,
    dataProp: String,
  },
  methods: {
    renderChart() {
      new Chart(document.getElementById('myChart').getContext('2d'), {
        type: 'bar',
        data: {
          labels: JSON.parse(this.labels),
          datasets: [
            {
              label: 'Ricavato',
              data: JSON.parse(this.dataProp),
              backgroundColor: [
                '#2ecc71',
                '#e74c3c',
                '#8e44ad',
                '#d35400',
                '#16a085',
              ],
            },
          ],
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
            },
          },
          title: {
            display: true,
            fontSize: 22,
            text: 'Ricavato',
          },
        },
      })
    },
  },
  mounted() {
    this.renderChart()
  },
}
</script>
