function get_task(id) {
    document.getElementById("task-id").value = id;
    let title = document.getElementById(id).children[1].children[1].children[0].children[0].getAttribute('data-task');
    let time = document.getElementById(id).children[1].children[1].children[0].children[1].children[0].getAttribute('data-task');
    let Description = document.getElementById(id).children[1].children[1].children[0].children[1].children[1].getAttribute('data-task');
    let priority = document.getElementById(id).children[1].children[1].children[0].children[2].children[0].getAttribute('data-task');
    let type = document.getElementById(id).children[1].children[1].children[0].children[2].children[1].getAttribute('data-task');
    let status = document.getElementById(id).children[1].getAttribute('id-status');

    if (type === 'Bug') {
        document.getElementById('task-type-bug').checked = true;
    } else {
        document.getElementById('task-type-feature').checked = true;
    }
    document.getElementById('task-title').value = title;
    document.getElementById('task-date').value = time;
    document.getElementById('task-description').value = Description;
    document.getElementById('task-priority').value = priority;
    document.getElementById('task-status').value = status;
    document.getElementById('')

    document.getElementById('task-update-btn').style.display = 'block';
    document.getElementById('task-delete-btn').style.display = 'block';
    document.getElementById('task-save-btn').style.display = 'none';



    $("#modal-task").modal("show");
}

function clear_task() {

    document.getElementById('task-update-btn').style.display = 'none';
    document.getElementById('task-delete-btn').style.display = 'none';
    document.getElementById('task-save-btn').style.display = 'block';
    document.getElementById('form-task').reset();


}