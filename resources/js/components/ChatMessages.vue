<template>
    <div>
        <div class="chat-message" v-for="message in messages">
            <div
                class="flex"
                :class="{
                    'justify-end': message.user.id == user.id,
                    'items-end': message.user.id != user.id,
                }"
            >
                <div
                    class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2"
                    :class="{
                        'items-start': message.user.id != user.id,
                        'items-end': message.user.id == user.id,
                    }"
                >
                    <div style="margin-bottom: 20px">
                        <span
                            class="px-4 py-2 rounded-lg inline-block"
                            :class="{
                                'rounded-br-none bg-blue-600 text-white':
                                    message.user.id == user.id,
                                'rounded-bl-none bg-gray-300 text-gray-600':
                                    message.user.id != user.id,
                            }"
                        >
                            {{ message.message }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { onMounted } from "vue";
import useChat from "../composable/chat";

export default {
    name: "ChatMessages",
    props: {
        user: {
            required: true,
            type: Object,
        },
    },
    setup() {
        const { messages, getMessages } = useChat();

        onMounted(getMessages);

        Echo.private(`chat`).listen("MessageSend", (e) => {
            messages.value.push({
                message: e.message.message,
                user: e.user,
            });
        });

        return {
            messages,
        };
    },
};
</script>
