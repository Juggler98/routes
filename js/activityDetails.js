class ActivityDetails {
    constructor() {
        this.getActivityDetails();
    }

    getActivityDetails() {
        console.log(sessionStorage.getItem('act'));
        document.getElementById('id').className = sessionStorage.getItem('act');
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new ActivityDetails();
});