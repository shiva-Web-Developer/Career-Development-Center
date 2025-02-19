
'use strict';

const applicationServerPublicKey = 'BC1zOXSbG4hRnhj2JJnTbjD9Vav8XeF7esZ1g6pW0XLvyZM7I-k5cNY-LjyVvUhmniGoo8dSVjg0VulDmUHZDm8';

const pushButton = document.querySelector('.js-push-btn');
let isSubscribed = false;
let swRegistration = null;

function urlB64ToUint8Array(base64String) {
    const padding = '='.repeat((4 - base64String.length % 4) % 4);
    const base64 = (base64String + padding)
    .replace(/\-/g, '+')
    .replace(/_/g, '/');

    const rawData = window.atob(base64);
    const outputArray = new Uint8Array(rawData.length);

    for (let i = 0; i < rawData.length; ++i) {
    outputArray[i] = rawData.charCodeAt(i);
    }
    return outputArray;
}
if ('serviceWorker' in navigator && 'PushManager' in window) {
  console.log('Service Worker and Push are supported');

  navigator.serviceWorker.register('sw.js')
  .then(function(swReg) {
    console.log('Service Worker is registered', swReg);

    swRegistration = swReg;
  })
  .catch(function(error) {
    console.error('Service Worker Error', error);
  });
} else {
    console.warn('Push Notifications is not supported');
    pushButton.textContent = 'Push Not Supported';
    pushButton.style.display = "none";
}

function initializeUI() {
    pushButton.addEventListener('click', function() {
      pushButton.disabled = true;
      if (isSubscribed) {
        unsubscribeUser();
      } else {
        subscribeUser();
      }
    });
  
    // Set the initial subscription value
    swRegistration.pushManager.getSubscription()
    .then(function(subscription) {
      isSubscribed = !(subscription === null);
  
      updateSubscriptionOnServer(subscription);
  
      if (isSubscribed) {
        notificationModal.style.display = "none";
        console.log('User IS subscribed asda.');
      } else {
        console.log('User is NOT subscribed.');
      }
  
      updateBtn();
    });
  }

function updateBtn() {
    if (Notification.permission === 'denied') {
      pushButton.textContent = 'Push Notifications Blocked';
      pushButton.disabled = true;
      updateSubscriptionOnServer(null);
      return;
    }
  
    if (isSubscribed) {
      pushButton.textContent = 'Disable Push Notifications';
     
      notificationModal.style.display = "none"; // Hide the modal

    } else {
      pushButton.textContent = 'Enable Push Notifications';
    }
  
    pushButton.disabled = false;
}
navigator.serviceWorker.register('sw.js')
    .then(function(swReg) {
    console.log('Service Worker is registered', swReg);

    swRegistration = swReg;
    initializeUI();
})

function subscribeUser() {
    const applicationServerKey = urlB64ToUint8Array(applicationServerPublicKey);
    swRegistration.pushManager.subscribe({
      userVisibleOnly: true,
      applicationServerKey: applicationServerKey
    })
    .then(function(subscription) {
      console.log('User is subscribed.');
  
      updateSubscriptionOnServer(subscription);
  
      isSubscribed = true;
  
      updateBtn();
    })
    .catch(function(error) {
      console.error('Failed to subscribe the user: ', error);
      updateBtn();
    });
  }

function push_sendSubscriptionToServer(subscription, method) {
    //console.log(subscription);
    const key = subscription.getKey('p256dh');
    const token = subscription.getKey('auth');
    return fetch('web-push/push_subscription.php', {
        method,
        body: JSON.stringify({
            endpoint: subscription.endpoint,
            key: key ? btoa(String.fromCharCode.apply(null, new Uint8Array(key))) : null,
            user_id: guid,
            method: method,
            token: token ? btoa(String.fromCharCode.apply(null, new Uint8Array(token))) : null
        }),
    }).then(() => subscription);
}

function updateSubscriptionOnServer(subscription) {
    // TODO: Send subscription to application server
  
    const subscriptionDetails = document.querySelector('.js-subscription-details');
  
    if (subscription) {
        push_sendSubscriptionToServer(subscription, 'POST');
        console.log(subscription);
        subscriptionDetails.classList.remove('is-invisible');
    } else {
        subscriptionDetails.classList.add('is-invisible');
    }
}

function unsubscribeUser() {
    swRegistration.pushManager.getSubscription()
    .then(function(subscription) {
      if (subscription) {
        // TODO: Tell application server to delete subscription
        push_sendSubscriptionToServer(subscription, 'DELETE');
        return subscription.unsubscribe();
      }
    })
    .catch(function(error) {
      console.log('Error unsubscribing', error);
    })
    .then(function() {
      updateSubscriptionOnServer(null);
  
      console.log('User is unsubscribed.');
      isSubscribed = false;
  
      updateBtn();
    });
  }