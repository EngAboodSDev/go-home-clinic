/*!
 * Go Home Clinic Website and Dashboard - v1.0.0
 * Designed and Developed by Abdulrahman Fadhl Ameer Saif
 * @EngAboodSDev <abdulrahmanfadhl@gmail.com>
 * Copyright © 2026 Go Home Clinic (Website and Dashboard)
 * All rights reserved.
 * License - This project is licensed under the MIT License - see the LICENSE file for details.
*/
const doc = document;
const menuOpen = doc.querySelector(".menu");
const menuClose = doc.querySelector(".close");
const overlay = doc.querySelector(".overlay");

menuOpen.addEventListener("click", () => {
  overlay.classList.add("overlay--active");
});

menuClose.addEventListener("click", () => {
  overlay.classList.remove("overlay--active");
});

/*!
 * Go Home Clinic Website and Dashboard - v1.0.0
 * Designed and Developed by Abdulrahman Fadhl Ameer Saif
 * @EngAboodSDev <abdulrahmanfadhl@gmail.com>
 * Copyright © 2026 Go Home Clinic (Website and Dashboard)
 * All rights reserved.
 * License - This project is licensed under the MIT License - see the LICENSE file for details.
*/


