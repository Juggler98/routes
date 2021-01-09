class ActivityInfo {
    constructor() {
        this.getActivityInfo();
    }

    getActivityInfo() {
        var items = [];
        document.addEventListener('DOMContentLoaded', () => {
            for (var i = 0; i < document.getElementById('count').className; i++) {
                console.log(i.toString());
                items[i] = document.getElementsByClassName(i.toString())[0];
                items[i].onclick = () => this.set(items[i].id);

            }
        });
    }

    set(index) {
        sessionStorage.setItem('act', index);
        console.log(index);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new ActivityInfo();
});
