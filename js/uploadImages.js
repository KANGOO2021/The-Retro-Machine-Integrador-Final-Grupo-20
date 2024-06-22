// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.6.0/firebase-app.js";
import { getStorage, ref, getDownloadURL, uploadBytes, uploadBytesResumable } from "https://www.gstatic.com/firebasejs/10.6.0/firebase-storage.js";;
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional

const firebaseConfig = {
    apiKey: "AIzaSyA2Fllddfdb6v2oVQzHcjKZsQnV9sGTzJc",
    authDomain: "retro-machine-19b78.firebaseapp.com",
    projectId: "retro-machine-19b78",
    storageBucket: "retro-machine-19b78.appspot.com",
    messagingSenderId: "152892418366",
    appId: "1:152892418366:web:1a922ef05d5d30147a246f",
    measurementId: "G-M9LGR52MYH"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const storage = getStorage(app);



//subir imagenes de productos a Firebase y obtener URL
const name = document.getElementById('imagen');

document.getElementById("boton").addEventListener("click", function () {


    alert('Selected file: ' + name.files.item(0).name);
    const storageRef = ref(storage, 'imagenes-productos/' + name.files.item(0).name);



    // 'file' comes from the Blob or File API
    uploadBytes(storageRef, name.files[0]).then((snapshot) => {
        console.log('Uploaded a blob or file!');

        getDownloadURL(ref(storage, 'imagenes-productos/' + name.files.item(0).name))
            .then((url) => {
                // `url` is the download URL for 'images/stars.jpg'

                //console.log(url)


                // Or inserted into an <img> element
                const img = document.getElementById('up-img');
                img.value=url;
                //const img1 = document.getElementById('image');
                //img1.setAttribute('src', url);
            })
            .catch((error) => {
                console.log(errorMessage);
            });
    });
    
    
    const uploadTask = uploadBytesResumable(storageRef, name.files[0]);

    // Register three observers:
    // 1. 'state_changed' observer, called any time the state changes
    // 2. Error observer, called on failure
    // 3. Completion observer, called on successful completion
    uploadTask.on('state_changed',
        (snapshot) => {
            // Observe state change events such as progress, pause, and resume
            // Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
            const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
            
            //document.getElementById('progress-bar').value = progress
            document.getElementById('progress-bar').style.width = progress + '%';
            document.getElementById('progress-bar').innerHTML = progress + '%';
           
            console.log('Upload is ' + progress + '% done');
            switch (snapshot.state) {
                case 'paused':
                    console.log('Upload is paused');
                    break;
                case 'running':
                    console.log('Upload is running');
                    break;
            }
        },
        (error) => {
            // Handle unsuccessful uploads
        },
        
        () => {
            // Handle successful uploads on complete
            // For instance, get the download URL: https://firebasestorage.googleapis.com/...
            getDownloadURL(uploadTask.snapshot.ref).then((downloadURL) => {
                console.log('File available at', downloadURL);
            });
        }
      
    );
    
    
    
    
    
    
    
    
    
    
})



 

  
 
 











 