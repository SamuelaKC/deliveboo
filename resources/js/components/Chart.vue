<template>
  <div class="chart-container">
    <canvas id="myChart" class="chart-legend"></canvas>
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
              label: 'Ricavi',
              data: JSON.parse(this.dataProp),
              backgroundColor: [
                '#12ccbc',
                '#2ad1c3',
                '#41d6c9',
                '#59dbd0',
                '#71e0d7',
                '#89e6de',
                '#a0ebe4',
                '#b8f0eb',
                '#d0f5f2',
                '#e7faf8',
                '#ffffff',
                '#e7faf8',
                '#d0f5f2',
                '#b8f0eb',
                '#a0ebe4',
                '#89e6de',
                '#71e0d7',
                '#59dbd0',
                '#41d6c9',
                '#2ad1c3',
                '#12ccbc',
              ],
              hoverBackgroundColor: [
                '#6512cc',
                '#742ad1',
                '#8441d6',
                '#9359db',
                '#a371e0',
                '#b289e6',
                '#c1a0eb',
                '#d1b8f0',
                '#e0d0f5',
                '#f0e7fa',
                '#ffffff',
                '#f0e7fa',
                '#e0d0f5',
                '#d1b8f0',
                '#c1a0eb',
                '#b289e6',
                '#a371e0',
                '#9359db',
                '#8441d6',
                '#742ad1',
                '#6512cc',
              ],
              borderWidth: 1,
              borderColor: [
                '#12ccbc',
                '#10b8a9',
                '#0ea396',
                '#0d8f84',
                '#0b7a71',
                '#09665e',
                '#07524b',
                '#053d38',
                '#042926',
                '#021413',
                '#000000',
                '#021413',
                '#042926',
                '#053d38',
                '#07524b',
                '#09665e',
                '#0b7a71',
                '#0d8f84',
                '#0ea396',
                '#10b8a9',
                '#12ccbc',
              ],
              hoverBorderWidth: 3,
              hoverBorderColor: [
                '#6512cc',
                '#5b10b8',
                '#510ea3',
                '#470d8f',
                '#3d0b7a',
                '#330966',
                '#280752',
                '#1e053d',
                '#140429',
                '#0a0214',
                '#000000',
                '#0a0214',
                '#140429',
                '#1e053d',
                '#280752',
                '#330966',
                '#3d0b7a',
                '#470d8f',
                '#510ea3',
                '#5b10b8',
                '#6512cc',
              ],
            },
          ],
        },
        options: {
          layout: {
            titleSpacing: 150,
          },
          scales: {
            y: {
              stacked: true,
              grid: {
                display: true,
                color: '#d0eb99',
              },
            },
            x: {
              grid: {
                display: false,
              },
            },
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
