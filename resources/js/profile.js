const settingBtn = document.querySelector(".setting-toogle");
const profileShow = document.querySelector(".profile-show");
const profileEdit = document.querySelector(".profile-edit");




export default {
    if (settingBtn) {
        settingBtn.addEventListener('click', function () {
            profileShow.classList.toggle('hidden');
            profileEdit.classList.toggle('hidden');
        })
    }
}