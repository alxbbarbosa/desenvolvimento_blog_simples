import {
    Line
} from "vue-chartjs"

export default {
    extends: Line,
    data() {
        return {}
    },
    mounted() {
        this.renderChart({
            labels: [
                'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'
            ],
            datasets: [{
                label: 'Visualizações',
                backgroundColor: "#5DBCD2",
                data: [40, 39, 31, 11, 45, 50]
            }]
        }, {
            responsive: true,
            maintainAspectRatio: false
        })
    }
}
