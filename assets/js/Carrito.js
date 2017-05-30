class  Carrito{
  constructor(id,cantidad){
    this._id=id;
    this._cantidad = cantidad;
  }
  get id(){
    return this._id;
  }
  set id(id){
    this._id=id;
  }
  get cantidad(){
    return this._cantidad;
  }
  set cantidad(cantidad){
    this._cantidad=cantidad;
  }
}
