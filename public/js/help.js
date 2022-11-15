function preventSubmit(btn) {
    btn.disabled = true;
    btn.form.submit();
}