extends Node2D

@onready var obstacle:PackedScene = preload("res://Obstacles.tscn")
var scrolling = true
@export var SCROLL_SPEED = 300

# Called when the node enters the scene tree for the first time.
func _ready() -> void:
	pass

# Called every frame. 'delta' is the elapsed time since the previous fram
# TODO increase scrolling speed with time
func _process(delta: float) -> void:
	if scrolling == true:
		$ParallaxBackground.scroll_offset.x -= SCROLL_SPEED * delta

# TODO spawn obstacles at random intervals

func stop_scrolling():
	scrolling = false


func _on_obstacle_timer_timeout() -> void:
	if scrolling:
		print("spawning a new obstacle!")
		var new_obstacle = obstacle.instantiate()
		new_obstacle.position.x = 1400
		new_obstacle.position.y = 649
		new_obstacle.visible = true
		new_obstacle.add_to_group('obstacles')
		self.add_child(new_obstacle)
		$ObstacleTimer.start(randf_range(1.5, 3))
