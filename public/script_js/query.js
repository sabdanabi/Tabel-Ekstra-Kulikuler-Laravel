
//script for button action start
document.addEventListener('DOMContentLoaded', function () {
    const ellipsisButtons = document.querySelectorAll('.ellipsis-btn');

    ellipsisButtons.forEach(button => {
        button.addEventListener('click', () => {
            const studentId = button.getAttribute('data-student-id');
            const actionsDiv = document.getElementById(`actions-${studentId}`);

            if (actionsDiv) {
                actionsDiv.classList.toggle('hidden');
                actionsDiv.classList.toggle('absolute');
                
                ellipsisButtons.forEach(btn => {
                    if (btn !== button) {
                        btn.disabled = !btn.disabled;
                    }
                });
            }
        });
    });
});
//script for button action end