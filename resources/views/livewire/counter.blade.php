<div class="counter">
    <button class="counter__btn counter__increment counter__hover" wire:click="increment" type="button">+</button>
    <input class="counter__field" wire:model="count" type="number" name="quantity" id="quantity" min="1" max="99" required/>
    <button class="counter__btn counter__decrement counter__hover" wire:click="decrement" type="button">-</button>
</div>
