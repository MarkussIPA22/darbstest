<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Majaslap</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            margin: 0;
            overflow: hidden;
            transition: transform 1s;   
        }

        #main-container {
            width: 1500px;
            height: 1000px;
            margin: auto;
        }

        .hover-square {
            width: 70px; 
            height: 70px;
            background-color: #f00;
            position: relative;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s ease;
            margin: auto;
        }

        .hover-square img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .hover-square:hover {
            background-color: transparent;
        }

        .hover-square:hover img {
            opacity: 1;
        }

        td {
            vertical-align: middle;
            text-align: center;
        }

        #confetti-container {
    position: relative;
    overflow: hidden;
    height: 100px; 
    width: 100px; 
    border: 1px solid #ccc;
    background-color: #fff;
    margin: auto;
}

.confetti {
    position: absolute;
    width: 5px;
    height: 5px;
    background-color: #f00;
    opacity: 0.7;
    animation: fall linear infinite;
}

@keyframes fall {
    0% {
        transform: translateY(-100px) rotate(0deg);
        opacity: 1;
    }
    100% {
        transform: translateY(100px) rotate(360deg); 
        opacity: 0;
    }
}

.confetti:nth-child(odd) {
    background-color: #0f0;
}

.confetti:nth-child(even) {
    background-color: #00f;
}


 
        .button {
            padding: 8px 16px;
            font-size: 14px;
            color: #fff;
            background-color: #007bff;
            border: 2px solid #0056b3;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .button:hover {
            background-color: #0056b3;
        }

    

        
        @keyframes rotateRightLeft {
    0% {
        transform: rotate(0deg);
    }
    50% {
        transform: rotate(360deg); 
    }
    100% {
        transform: rotate(-360deg);
    }
}

.rotate-screen {
    animation: rotateRightLeft 1s forwards;
}

        .breathing-bubble {
    width: 70px;
    height: 70px;
    background: linear-gradient(45deg, red, blue); 
    border-radius: 50%;
    animation: breathe 6s infinite, changeColors 6s infinite;
    margin: auto;
}

@keyframes breathe {
    0%, 100% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.5);
    }
}

@keyframes changeColors {
    0% {
        background: linear-gradient(45deg, red, blue); 
    }
    50% {
        background: linear-gradient(45deg, red, green); 
    }
    100% {
        background: linear-gradient(45deg, red, blue); 
    }
}

        .link-container {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .link-container a {
    color: blue;
    text-decoration: none;
    transition: color 1s;

}

.link.clicked {
    color: red;
}

.link-container a:hover {
    color: orange;
}



        #weather {
            font-size: 16px;
            padding: 10px;
        }

     
        .form-container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .form-container input {
        margin-bottom: 10px;
        padding: 8px;
        font-size: 16px;
        width: 100%;
        max-width: 200px; 
    }

    .form-container button {
        padding: 8px 16px;
        font-size: 16px;
        color: #fff;
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .form-container button:hover {
        background-color: #0056b3;
    }
    </style>
</head>
<body>
    <table border="1" style="width: 600px; height: 400px; margin: auto;">
        <tr>
            <td>
                <div class="hover-square">
                    <img src="{{ asset('images/vtdt.jpg') }}" alt="vtdt image">
                </div>
            </td>
            <td id="confetti-container">
            </td>
            <td>
                <a href="#" class="button" id="animateButton">Click Me</a>
            </td>
        </tr>
        <tr>
            <td>
                <div class="breathing-bubble"></div>
            </td>
            <td>
                <div class="link-container">
                    <div class="link-container">
                        <a href="https://www.google.com" target="_blank" class="link">Google</a>
                        <a href="https://www.facebook.com" target="_blank" class="link">Facebook</a>
                        <a href="https://www.twitter.com" target="_blank" class="link">Twitter</a>
                        <a href="https://www.linkedin.com" target="_blank" class="link">LinkedIn</a>
                        <a href="https://www.github.com" target="_blank" class="link">GitHub</a>

                        
                    </div>
                    
            </td>
            <td id="weather">{{ $weather ?? 'Loading weather...' }}</td>
        </tr>
        <tr>
            <td>
                <div class="form-container">
                    <form id="userForm" method="POST" action="/save_user">
                        @csrf
                        <input type="text" id="firstName" name="firstName" placeholder="Vārds" required pattern="^[a-zA-ZāčēģīķļņōŗšūžĀČĒĢĪĶĻŅŌŖŠŪŽ]+$" title="Lūdzu ievadiet tikai ciparus">
                        <input type="text" id="lastName" name="lastName" placeholder="Uzvārds" required pattern="^[a-zA-ZāčēģīķļņōŗšūžĀČĒĢĪĶĻŅŌŖŠŪŽ]+$" title="Lūdzu ievadiet tikai ciparus">
                        <input type="text" id="phone" name="phone" placeholder="Telefona Numurs" required pattern="^\d+$" title="Lūdzu ievadiet tikai skaitļus">
                        <input type="text" id="personalCode" name="personalCode" placeholder="Personas Kods" required pattern="^\d+$" title="Lūdzu ievadiet tikai skaitļus">
                        <button type="submit">Iesniegt</button>
                    </form>
                </div>
                
            </td>
            <td>
                <div class style="width: 150px">
                    <div class="form-container">

                        <style>
                            .form-containers {
                                display: flex;
                                padding: 6px;
                                flex-direction: column;
                                align-items: center;
                            }
                        
                            .form-containers input {
                                margin-bottom: 15px; 
                                padding: 8px;
                                font-size: 16px;
                                width: 80%;
                                max-width: 120px; 
                            }
                        
                            .form-containers button {
                                padding: 4px 8px;
                                font-size: 16px;
                                width: 100px;
                                color: #fff;
                                background-color: #007bff;
                                border: none;
                                border-radius: 5px;
                                cursor: pointer;
                            }
                        
                            .form-container button:hover {
                                background-color: #0056b3;
                            }

                            .form-containeris button {
                                border-radius: 5px;
                                background-color: #007bff;
                                color: #fff;
                                width: 100px;
                                font-size: 16px;
                                position: relative;
                            margin-top: 90px;
                            }





                        </style>
                      <div class="form-containers">
                    <form id="editUserForm" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="editUserId" name="id">
                        <input type="text" id="editFirstName" name="firstName" placeholder="Vārds" required>
                        <input type="text" id="editLastName" name="lastName" placeholder="Uzvārds" required>
                        <input type="text" id="editPhone" name="phone" placeholder="Telefona Numurs" required>
                        <input type="text" id="editPersonalCode" name="personalCode" placeholder="Personas Kods" required>
                        <button type="submit">Atjauninat lietotaju</button>
                    </form>
                </div>
                </div>
            </td>
            <td>
                <div class="form-containeris">
                    <select id="userDropdown">
                        <option>Izvelaties lietotaju</option>
                        <!-- Users will be loaded here -->
                    </select>
                    <button id="deleteUserButton">Dzest lietotaju</button>
                 

                </div>
            </td>
        </tr>
    </table>

    <script>
     function createConfetti() {
    const confetti = document.createElement('div');
    confetti.classList.add('confetti');
    confetti.style.left = Math.random() * 100 + 'px'; // Adjust to fit within the container width
    confetti.style.animationDuration = Math.random() * 3 + 2 + 's';
    document.getElementById('confetti-container').appendChild(confetti);
    setTimeout(() => confetti.remove(), 5000); 
}

function startConfetti() {
    for (let i = 0; i < 50; i++) {
        createConfetti();
    }
}

startConfetti();
setInterval(startConfetti, 3000); 



        document.getElementById('animateButton').addEventListener('click', function() {
            document.body.classList.add('rotate-screen');
            setTimeout(() => document.body.classList.remove('rotate-screen'), 1000);
        });

        document.getElementById('userForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(this);

    fetch('/save_user', {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.errors) {
            // Handle validation errors
            alert('Validation Errors: ' + JSON.stringify(data.errors));
        } else {
            alert(data.message);
            this.reset();
            loadUsers();
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

        // Function to load users into dropdown
        function loadUsers() {
            fetch('/users')
                .then(response => response.json())
                .then(users => {
                    const userDropdown = document.getElementById('userDropdown');
                    userDropdown.innerHTML = '<option>izvelaties lietotaju</option>'; 

                    users.forEach(user => {
                        const option = document.createElement('option');
                        option.value = user.id;
                        option.textContent = user.first_name + ' ' + user.last_name;
                        userDropdown.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching users:', error);
                });
        }

        document.getElementById('deleteUserButton').addEventListener('click', function() {
            const userId = document.getElementById('userDropdown').value;

            if (userId && userId !== ' izvelaties lietotaju') {
                fetch('/delete_user/' + userId, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message); // Show a success message
                    loadUsers(); // Refresh user list
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            } else {
                alert('Izvelaties kuru lietoaju izdzest.');
            }
        });


     

        // Initial user load
        loadUsers();

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.link').forEach(link => {
                link.addEventListener('click', function(event) {
                   

                   
                    document.querySelectorAll('.link').forEach(l => l.classList.remove('clicked'));

                    this.classList.add('clicked');
                });
            });
        });

        document.getElementById('userDropdown').addEventListener('change', function() {
    const userId = this.value;

    if (userId && userId !== 'Izvelaties lietotaju') {
        fetch('/users/' + userId + '/edit')
            .then(response => response.json())
            .then(user => {
                document.getElementById('editUserId').value = user.id;
                document.getElementById('editFirstName').value = user.first_name;
                document.getElementById('editLastName').value = user.last_name;
                document.getElementById('editPhone').value = user.phone;
                document.getElementById('editPersonalCode').value = user.personal_code;
            })
            .catch(error => {
                console.error('Error fetching user details:', error);
            });
    }
});
document.getElementById('editUserForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(this);
    const userId = formData.get('id'); // Get the user ID from the form

    fetch('/update_user/' + userId, {
        method: 'PUT',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        alert('Lietotajs atjauninats veiksmigi.'); 
        loadUsers(); // Refresh user list to reflect changes
    })
    
    });



    </script>
</body>
</html>