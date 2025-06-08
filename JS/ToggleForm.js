function toggleForm(formId) {
    document.getElementById('createForm').style.display = 'none';
    document.getElementById('updateForm').style.display = 'none';
    document.getElementById('deleteForm').style.display = 'none';
    document.getElementById(formId).style.display = 'block';
}
