@extends('layouts.header')
@section('content')
    <div class="chat-page">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="chat-window">
                            <!-- Left: Chat Users List -->
                            <div class="chat-cont-left">
                                <div class="chat-header">
                                    <span>Chats</span>
                                    <a href="javascript:void(0)" class="chat-compose">
                                        <span><i class="fe fe-plus-circle"></i></span>
                                    </a>
                                </div>
                                <form class="chat-search">
                                    <div class="input-group">
                                        <div class="input-group-prefix">
                                            <i class="fas fa-search"></i>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Search">
                                    </div>
                                </form>
                                <div class="chat-users-list">
                                    <div class="chat-scroll">
                                        @foreach ($users as $user)
                                            <a href="javascript:void(0);" class="chat-block d-flex"
                                                onclick="loadMessages({{ $user->id }}, this)"
                                                data-user-id="{{ $user->id }}">
                                                <div class="media-img-wrap">
                                                    <div
                                                        class="avatar avatar-{{ $user->is_online ? 'online' : 'offline' }}">
                                                        <img src="assets/img/profiles/avatar-{{ ($user->id % 10) + 1 }}.jpg"
                                                            alt="User Image" class="avatar-img rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div class="user-name">{{ $user->name }}</div>
                                                    <div class="user-last-chat">Last message preview here</div>
                                                    <div>
                                                        <div class="last-chat-time block">2 min</div>
                                                        <div class="badge badge-success">15</div>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Right: Chat Box -->
                            <div class="chat-cont-right">
                                <div class="chat-header">
                                    <a id="back_user_list" href="javascript:void(0)" class="back-user-list">
                                        <i class="fa fa-chevron-left"></i>
                                    </a>
                                    <div class="chat-block d-flex">
                                        <div class="media-img-wrap">
                                            <div class="avatar avatar-online">
                                                <img src="assets/img/profiles/avatar-02.jpg" alt="User Image"
                                                    class="avatar-img rounded-circle">
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="user-name" id="chat-user-name">Select a User</div>
                                            <div class="user-status">online</div>
                                        </div>
                                    </div>
                                    <div class="chat-options">
                                        <a href="javascript:void(0)">
                                            <span><i class="fe fe-phone"></i></span>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <span><i class="fe fe-video"></i></span>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <span><i class="fe fe-more-vertical"></i></span>
                                        </a>
                                    </div>
                                </div>

                                <div class="chat-body">
                                    <div class="chat-scroll" id="chat-box">
                                        <ul class="list-unstyled" id="chatShow">
                                        </ul>
                                    </div>
                                </div>

                                <!-- Chat Footer: Form for Sending Messages -->
                                <div class="chat-footer">
                                    <form id="sendMessageForm" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" id="receiver_id" name="receiver_id" value="">
                                        <div class="input-group">
                                            <div class="input-group-prefix">
                                                <div class="btn-file btn">
                                                    <i class="fas fa-paperclip"></i>
                                                    <input type="file" name="attachment" id="attachment">
                                                </div>
                                            </div>
                                            <input type="text" name="message" id="content"
                                                class="input-msg-send form-control" placeholder="Type something">
                                            <button type="submit" class="btn msg-send-btn"><i
                                                    class="fas fa-paper-plane"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /Chat Box -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let activeReceiverId = null;
        let activeChatUser = null;
        let pollingInterval = null;
        let typingTimeout;
        let isTyping = false;

        // Function to load messages with polling
        function loadMessages(receiverId, element = null) {
            activeReceiverId = receiverId;
            $('#receiver_id').val(receiverId);
            $('#chat-user-name').text($(`a[data-user-id="${receiverId}"] .user-name`).text());

            if (activeChatUser) {
                activeChatUser.classList.remove('active');
            }
            if (element) {
                activeChatUser = element;
                activeChatUser.classList.add('active');
            }

            $.ajax({
                url: `/messages/fetch/${receiverId}`,
                method: 'GET',
                success: function(data) {
                    const chatShow = document.getElementById('chatShow');
                    chatShow.innerHTML = '';
                    data.forEach((msg, index) => {
                        const messageClass = msg.sender_id === {{ Auth::id() }} ? 'sent' :
                        'received';
                        let messageHtml = '';

                        if (messageClass === 'sent') {
                            messageHtml = `
                        <li class="chat-block sent pe-4 show">
                            <div class="media-body">
                                <div class="msg-box">
                                    <div>
                                        <p>${msg.message ?? ''}</p>
                                        <ul class="chat-msg-info">
                                            <li>
                                                <div class="chat-time">
                                                    <span>${new Date(msg.created_at).toLocaleTimeString()}</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>`;
                        } else {
                            messageHtml = `
                        <li class="chat-block d-flex received show">
                            <div class="avatar">
                                <img src="assets/img/profiles/avatar-02.jpg" alt="User Image" class="avatar-img rounded-circle">
                            </div>
                            <div class="media-body">
                                <div class="msg-box">
                                    <div>
                                        <p>${msg.message ?? ''}</p>
                                        <ul class="chat-msg-info">
                                            <li>
                                                <div class="chat-time">
                                                    <span>${new Date(msg.created_at).toLocaleTimeString()}</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                ${msg.attachment_path ? `
                                        <div class="msg-box">
                                            <div>
                                                <div class="chat-msg-attachments">
                                                    <div class="chat-attachment">
                                                        <img src="/storage/${msg.attachment_path}" alt="attachment">
                                                        <div class="chat-attach-caption">${msg.attachment_path.split('/').pop()}</div>
                                                        <a href="/storage/${msg.attachment_path}" class="chat-attach-download" target="_blank">
                                                            <i class="fas fa-download"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <ul class="chat-msg-info">
                                                    <li>
                                                        <div class="chat-time">
                                                            <span>${new Date(msg.created_at).toLocaleTimeString()}</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>` : ''}
                            </div>
                        </li>`;
                        }
                        chatShow.innerHTML += messageHtml;
                    });
                    $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight);
                },
                error: function(error) {
                    console.error('Error fetching messages:', error);
                }
            });
        }

        // Start polling when user is selected
        function startPolling() {
            stopPolling(); // Stop any previous polling
            pollingInterval = setInterval(() => {
                if (activeReceiverId) {
                    loadMessages(activeReceiverId); // Refresh messages for the active receiver
                }
            }, 3000); // Poll every 3 seconds (adjust as needed)
        }

        // Stop polling when leaving the page or switching chat
        function stopPolling() {
            if (pollingInterval) {
                clearInterval(pollingInterval);
                pollingInterval = null;
            }
        }

        // Attach startPolling to the initial user load
        document.addEventListener('DOMContentLoaded', function() {
            startPolling(); // Start polling on page load
        });

        // Send message on form submission
        $('#sendMessageForm').on('submit', function(e) {
            e.preventDefault();

            let receiverId = $('#receiver_id').val();
            if (!receiverId) {
                alert('Please select a user to message.');
                return;
            }

            let formData = new FormData(this);

            $.ajax({
                url: '/messages/send',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(data) {
                    $('#content').val(''); // Clear the input field
                    $('#attachment').val(''); // Clear the file input

                    // Reload messages without reloading the page
                    loadMessages(data.message.receiver_id);
                },
                error: function(xhr) {
                    console.error('Error sending message:', xhr);
                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        for (const field in errors) {
                            console.log(`Validation error in ${field}: ${errors[field][0]}`);
                        }
                    } else {
                        console.error('Unexpected error:', xhr.responseText);
                    }
                }
            });
        });
    </script>
@endsection
