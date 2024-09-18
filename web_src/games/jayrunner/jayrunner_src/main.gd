extends Node2D

var scrolling = true

# Called when the node enters the scene tree for the first time.
func _ready() -> void:
	pass

# Called every frame. 'delta' is the elapsed time since the previous frame.
# TODO increase scrolling speed with time
func _process(delta: float) -> void:
	if scrolling == true:
		$ParallaxBackground.scroll_offset.x -= delta * 100

# TODO spawn obstacles at random intervals

func _on_obstacles_end_game() -> void:
	scrolling = false
