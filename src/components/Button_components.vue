<script>

export default {
    name: "Button_Component",
    props: {
        promotion: Object,
        shopNow: Function,
    }
}

</script>

<template>
 
    <button @click="shopNow(promotion)" class="Btn">Shop Now
        <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_4059_3)">
                <path
                    d="M10.345 4.32164L6.7675 0.744141L5.58917 1.92247L8.33333 4.66664H0V6.33331H8.33333L5.58917 9.07747L6.7675 10.2558L10.345 6.67831C10.6575 6.36576 10.833 5.94191 10.833 5.49997C10.833 5.05803 10.6575 4.63419 10.345 4.32164Z"
                    fill="white" />
            </g>
            <defs>
                <clipPath id="clip0_4059_3">
                    <rect width="10.8333" height="10" fill="white" transform="translate(0 0.5)" />
                </clipPath>
            </defs>
        </svg>


    </button>

</template>

<style>
.Btn {
    background-color: #3BB77E;
    border: none;
    color: aliceblue;
    display: flex;
    width: 6.5rem;
    padding: .4rem;
    height: 2rem;
    align-items: center;
    justify-content: center;
    gap: .4rem;
    border-radius: .25rem;
    font-weight: 550;
    cursor: pointer;
}
.Btn:hover{
    background-color: #FDC040;
}

.Btn svg {
    width: .8rem;
}
</style>